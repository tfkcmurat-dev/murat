<?php
/** Dedicated repair tables; existing customers and quotes are preserved. */
class Repair {
    private $pdo;
    public const STATUSES = ['registered'=>'Kayıt açıldı','inspection'=>'Arıza tespitinde','repairing'=>'Onarıma alındı','payment'=>'Ücretli onarım için ödeme bekleniyor','repaired'=>'Onarıldı','delivered'=>'Teslim edildi','cancelled'=>'İptal edildi'];
    public function __construct($pdo=null) {$this->pdo=$pdo?:Database::getInstance()->getConnection();}
    private function query($sql,$args=[]) {$s=$this->pdo->prepare($sql);$s->execute($args);return $s;}
    public function ready() {try {foreach(['bs_repairs','bs_repair_events','bs_repair_photos'] as $t)$this->query("SELECT id FROM $t LIMIT 1");return true;}catch(PDOException $e){return false;}}
    public function install() {
        $sqlite=$this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME)==='sqlite';
        $id=$sqlite?'INTEGER PRIMARY KEY AUTOINCREMENT':'BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY';
        $tail=$sqlite?'':' ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS bs_repairs (id $id, ticket VARCHAR(40) NOT NULL UNIQUE, customer_name VARCHAR(160) NOT NULL, phone VARCHAR(20) NOT NULL, email VARCHAR(190) NOT NULL, address TEXT NOT NULL, device VARCHAR(190) NOT NULL, serial_number VARCHAR(120) NOT NULL, fault TEXT NOT NULL, accessories TEXT NOT NULL, notes TEXT NOT NULL, amount_cents BIGINT NOT NULL DEFAULT 0, consent INTEGER NOT NULL DEFAULT 0, status VARCHAR(30) NOT NULL, version INTEGER NOT NULL DEFAULT 1, created_at VARCHAR(30) NOT NULL, updated_at VARCHAR(30) NOT NULL)$tail");
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS bs_repair_events (id $id, repair_id BIGINT NOT NULL, status VARCHAR(30) NOT NULL, message TEXT NOT NULL, phone VARCHAR(20) NOT NULL, notification VARCHAR(30) NOT NULL, provider_id VARCHAR(190), created_at VARCHAR(30) NOT NULL)$tail");
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS bs_repair_photos (id $id, repair_id BIGINT NOT NULL, filename VARCHAR(80) NOT NULL, mime VARCHAR(30) NOT NULL, created_at VARCHAR(30) NOT NULL)$tail");
    }
    public static function phone($value) {
        $v=preg_replace('/\D/','',(string)$value);
        if(strpos($v,'00')===0)$v=substr($v,2);
        if(strlen($v)===11&&$v[0]==='0')$v='90'.substr($v,1);elseif(strlen($v)===10)$v='90'.$v;
        if(!preg_match('/^905\d{9}$/D',$v))throw new InvalidArgumentException('Geçerli bir cep telefonu girin (05xx xxx xx xx).');return $v;
    }
    public static function amount($value) {
        $v=trim((string)$value);if($v==='')return 0;
        if(!preg_match('/^\d{1,8}(?:[,.]\d{1,2})?$/D',$v))throw new InvalidArgumentException('Ücreti 1250,50 şeklinde yazın; binlik ayırıcı kullanmayın.');
        $p=preg_split('/[,.]/',$v);return (int)$p[0]*100+(int)str_pad($p[1]??'',2,'0');
    }
    public static function data($input) {
        $d=[];foreach(['customer_name'=>160,'email'=>190,'address'=>2000,'device'=>190,'serial_number'=>120,'fault'=>5000,'accessories'=>2000,'notes'=>5000] as $k=>$max){$v=trim((string)($input[$k]??''));if(mb_strlen($v)>$max)throw new InvalidArgumentException('Çok uzun alan: '.$k);$d[$k]=$v;}
        foreach(['customer_name','device','fault'] as $k)if($d[$k]==='')throw new InvalidArgumentException('Müşteri adı, cihaz ve arıza açıklaması gereklidir.');
        if($d['email']!==''&&!filter_var($d['email'],FILTER_VALIDATE_EMAIL))throw new InvalidArgumentException('E-posta adresi geçersiz.');
        $d['phone']=self::phone($input['phone']??'');$d['amount_cents']=self::amount($input['amount']??'');$d['consent']=isset($input['consent'])?1:0;
        $d['status']=$input['status']??'registered';if(!isset(self::STATUSES[$d['status']]))throw new InvalidArgumentException('Geçersiz onarım durumu.');
        if($d['status']==='payment'&&$d['amount_cents']===0)throw new InvalidArgumentException('Ödeme bekleniyor durumu için ücret girin.');return $d;
    }
    public function find($id){return $this->query('SELECT * FROM bs_repairs WHERE id=?',[$id])->fetch(PDO::FETCH_ASSOC);}
    public function listing($search=''){
        $q='%'.str_replace(['!','%','_'],['!!','!%','!_'],$search).'%';return $this->query("SELECT * FROM bs_repairs WHERE customer_name LIKE ? ESCAPE '!' OR ticket LIKE ? ESCAPE '!' OR phone LIKE ? ESCAPE '!' OR device LIKE ? ESCAPE '!' ORDER BY id DESC LIMIT 200",[$q,$q,$q,$q])->fetchAll(PDO::FETCH_ASSOC);
    }
    public function events($id){return $this->query('SELECT * FROM bs_repair_events WHERE repair_id=? ORDER BY id DESC',[$id])->fetchAll(PDO::FETCH_ASSOC);}
    public function photos($id){return $this->query('SELECT * FROM bs_repair_photos WHERE repair_id=? ORDER BY id',[$id])->fetchAll(PDO::FETCH_ASSOC);}
    public function photo($id){return $this->query('SELECT * FROM bs_repair_photos WHERE id=?',[$id])->fetch(PDO::FETCH_ASSOC);}
    public static function message($r){
        $text='Merhaba '.$r['customer_name'].', Bilişim Servis kayıt numaranız: '.$r['ticket'].'. Cihaz: '.$r['device'].'. Durum: '.self::STATUSES[$r['status']].'.';
        if($r['amount_cents']>0)$text.=' Onarım ücreti: '.number_format($r['amount_cents']/100,2,',','.').' TL.';
        return $text.' Bilgi için: 0554 863 48 70.';
    }
    public function save($d,$id=0,$version=0,$photos=[]){
        $this->pdo->beginTransaction();try{
            $old=$id?$this->find($id):null;if($id&&(!$old||(int)$old['version']!==(int)$version))throw new RuntimeException('Kayıt değişmiş. Sayfayı yenileyip tekrar deneyin.');
            $now=(new DateTimeImmutable('now',new DateTimeZone('Europe/Istanbul')))->format('Y-m-d H:i:s');if(!$id)$d['status']='registered';$d['updated_at']=$now;
            if($id){$set=implode(',',array_map(fn($k)=>"$k=?",array_keys($d)));$s=$this->query("UPDATE bs_repairs SET $set,version=version+1 WHERE id=? AND version=?",array_merge(array_values($d),[$id,$version]));if($s->rowCount()!==1)throw new RuntimeException('Kayıt değişmiş. Sayfayı yenileyin.');}
            else{$d['ticket']='BS-'.(new DateTimeImmutable('now',new DateTimeZone('Europe/Istanbul')))->format('Ymd').'-'.strtoupper(bin2hex(random_bytes(4)));$d['created_at']=$now;$this->query('INSERT INTO bs_repairs ('.implode(',',array_keys($d)).') VALUES ('.implode(',',array_fill(0,count($d),'?')).')',array_values($d));$id=(int)$this->pdo->lastInsertId();}
            if(count($this->photos($id))+count($photos)>10)throw new InvalidArgumentException('Bir kayıtta en fazla 10 fotoğraf olabilir.');
            foreach($photos as $p)$this->query('INSERT INTO bs_repair_photos(repair_id,filename,mime,created_at) VALUES (?,?,?,?)',[$id,$p['filename'],$p['mime'],$now]);
            $eventId=0;if(!$old||$old['status']!==$d['status']){$r=$this->find($id);$this->query('INSERT INTO bs_repair_events(repair_id,status,message,phone,notification,created_at) VALUES (?,?,?,?,?,?)',[$id,$d['status'],self::message($r),$d['phone'],$d['consent']?'pending':'no_consent',$now]);$eventId=(int)$this->pdo->lastInsertId();}
            $this->pdo->commit();return [$id,$eventId];
        }catch(Throwable $e){$this->pdo->rollBack();throw $e;}
    }
    public function event($id){return $this->query('SELECT e.*,r.consent FROM bs_repair_events e JOIN bs_repairs r ON r.id=e.repair_id WHERE e.id=?',[$id])->fetch(PDO::FETCH_ASSOC);}
    public function claim($id){return $this->query("UPDATE bs_repair_events SET notification='sending' WHERE id=? AND notification='pending'",[$id])->rowCount()===1;}
    public function notification($id,$state,$provider=null){$this->query('UPDATE bs_repair_events SET notification=?,provider_id=? WHERE id=?',[$state,$provider,$id]);}
}
