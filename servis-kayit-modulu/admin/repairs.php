<?php
require_once __DIR__.'/../app/config/config.php';
requireAuth();
require_once APP_PATH.'/models/Repair.php';
require_once APP_PATH.'/helpers/repair-whatsapp.php';
require_once APP_PATH.'/helpers/repair-photos.php';
header('Cache-Control: no-store, private');
header('X-Robots-Tag: noindex, nofollow');
$model=new Repair();$ready=$model->ready();$repairError='';$id=max(0,(int)($_GET['id']??0));$action=$_GET['action']??'index';
$record=$ready&&$id&&$action==='edit'?$model->find($id):null;
if($action==='photo'){
    $photo=$ready?$model->photo($id):null;
    if(!$photo||!preg_match('/^[a-f0-9]{40}\.(jpg|png|webp)$/D',$photo['filename'])){http_response_code(404);exit;}
    $path=bsRepairStorage().'/'.$photo['filename'];if(!is_file($path)){http_response_code(404);exit;}
    header('Content-Type: '.$photo['mime']);header('X-Content-Type-Options: nosniff');header('Content-Disposition: inline; filename="device-photo.'.pathinfo($path,PATHINFO_EXTENSION).'"');readfile($path);exit;
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!validateCsrfToken((string)($_POST[CSRF_TOKEN_NAME]??''))){http_response_code(403);$repairError='Güvenlik doğrulaması başarısız. Sayfayı yenileyin.';}
    else{
        $uploads=[];
        try{
            if(($_POST['operation']??'')==='install'){$model->install();setFlash('success','Servis kayıt alanı hazır.');redirect(adminUrl('repairs.php'));}
            if(!$ready)throw new RuntimeException('Önce kayıt alanını etkinleştirin.');
            if(!in_array($action,['create','edit'],true))throw new InvalidArgumentException('Geçersiz işlem.');
            if($action==='edit'&&!$record)throw new InvalidArgumentException('Kayıt bulunamadı.');
            $data=Repair::data($_POST);$uploads=bsRepairUploadPhotos($_FILES['photos']??[]);
            [$savedId,$eventId]=$model->save($data,$action==='edit'?$id:0,(int)($_POST['version']??0),$uploads);
            $uploads=[];bsRepairNotify($model,$eventId);
            setFlash('success','Servis kaydı kaydedildi. WhatsApp mesajının durumunu aşağıdan görebilirsiniz.');redirect(adminUrl('repairs.php?action=edit&id='.$savedId));
        }catch(PDOException $e){bsRepairRemoveUploads($uploads);$repairError='Veritabanı işlemi tamamlanamadı. Hosting veritabanı izinlerini kontrol edin.';}
        catch(InvalidArgumentException|RuntimeException $e){bsRepairRemoveUploads($uploads);$repairError=$e->getMessage();}
        catch(Throwable $e){bsRepairRemoveUploads($uploads);$repairError='Kayıt tamamlanamadı. Hosting veritabanı ve dosya izinlerini kontrol edin.';}
    }
}
if($ready&&$action==='edit'&&!$record){http_response_code(404);$repairError='Kayıt bulunamadı.';$action='index';}
$search=mb_substr(trim((string)($_GET['q']??'')),0,100);
$pageTitle='Müşteri ve Servis Kayıtları';
require ADMIN_PATH.'/views/layouts/header.php';
require ADMIN_PATH.'/views/repairs/index.php';
require ADMIN_PATH.'/views/layouts/footer.php';
