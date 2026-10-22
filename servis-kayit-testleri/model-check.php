<?php
require '/site/app/models/Repair.php';require '/site/app/helpers/repair-whatsapp.php';
function check($v,$m){if(!$v)throw new Exception($m);}
$pdo=new PDO('sqlite::memory:');$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
$m=new Repair($pdo);check(!$m->ready(),'initial');$m->install();$m->install();check($m->ready(),'idempotent install');
$input=['customer_name'=>'Deneme Müşteri','phone'=>'0554 111 22 33','device'=>'Deneme TV','fault'=>'Görüntü yok','consent'=>'1'];
$d=Repair::data($input);[$id,$event]=$m->save($d);check($m->find($id)['status']==='registered','registered');check(str_contains($m->event($event)['message'],'Kayıt açıldı'),'registration message');
bsRepairNotify($m,$event);check($m->event($event)['notification']==='pending','no API no send');
$calls=0;$fake=function($e)use(&$calls){$calls++;return ['state'=>'accepted','id'=>'fake-test'];};bsRepairNotify($m,$event,$fake);bsRepairNotify($m,$event,$fake);check($calls===1,'deduplicated');check($m->event($event)['notification']==='accepted','API acceptance');
$r=$m->find($id);[$same,$none]=$m->save($d,$id,$r['version']);check($none===0&&count($m->events($id))===1,'unchanged no message');
try{$m->save($d,$id,1);throw new Exception('stale accepted');}catch(RuntimeException $e){check(str_contains($e->getMessage(),'değişmiş'),'version check');}
foreach(['inspection','repairing','payment','repaired','delivered'] as $status){$input['status']=$status;$input['amount']='1250,50';$d=Repair::data($input);[$same,$e]=$m->save($d,$id,$m->find($id)['version']);check(str_contains($m->event($e)['message'],Repair::STATUSES[$status]),$status);check(str_contains($m->event($e)['message'],'1.250,50 TL'),'amount message');}
check(count($m->events($id))===6,'history');check(count($m->listing('Deneme'))===1,'search');check(count($m->listing('%'))===0,'literal wildcard');
$input['status']='registered';unset($input['consent']);[$id2,$e2]=$m->save(Repair::data($input));bsRepairNotify($m,$e2,$fake);check($calls===1&&$m->event($e2)['notification']==='no_consent','consent enforced');
foreach(['phone'=>['x','1','02121112233'],'amount'=>['-1','1.000,50','1.234'],'status'=>['not-a-status']] as $key=>$bad){foreach($bad as $v){$t=$input;$t[$key]=$v;try{Repair::data($t);throw new Exception('invalid input accepted '.$key);}catch(InvalidArgumentException $e){}}}
$r=$m->find($id);$d=Repair::data($input);try{$m->save($d,$id,$r['version'],array_fill(0,11,['filename'=>'test.jpg','mime'=>'image/jpeg']));throw new Exception('11 photos accepted');}catch(InvalidArgumentException $e){}check($m->find($id)['version']===$r['version'],'transaction rollback');
$input['consent']='1';[$id3,$e3]=$m->save(Repair::data($input));bsRepairNotify($m,$e3,fn($e)=>throw new Exception('timeout'));check($m->event($e3)['notification']==='unknown','unknown result');bsRepairNotify($m,$e3,$fake);check($calls===1,'unknown not retried');
echo "PASS: install, create, validation, status transitions, money, history, search, consent, transaction rollback, optimistic lock, notification deduplication and timeout handling.\n";
