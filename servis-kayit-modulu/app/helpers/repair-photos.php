<?php
function bsRepairStorage(){
    // Outside public_html: photos can only be read via authenticated admin/repairs.php.
    return dirname(ROOT_PATH).'/bilisimservis-repair-files';
}
function bsRepairUploadPhotos($files){
    $saved=[];try{
        if(empty($files['name']))return [];
        if(!is_array($files['name'])||count($files['name'])>10)throw new InvalidArgumentException('En fazla 10 fotoğraf yükleyin.');
        $total=0;$types=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
        foreach($files['name'] as $i=>$unused){
            $error=$files['error'][$i]??UPLOAD_ERR_NO_FILE;if($error===UPLOAD_ERR_NO_FILE)continue;
            if($error!==UPLOAD_ERR_OK)throw new InvalidArgumentException('Fotoğraf yüklenemedi. Daha küçük dosyalarla tekrar deneyin.');
            $tmp=$files['tmp_name'][$i];$size=filesize($tmp);$total+=$size;
            if($size>5*1024*1024||$total>20*1024*1024)throw new InvalidArgumentException('Fotoğraf başına 5 MB, işlem başına 20 MB sınırı vardır.');
            $mime=(new finfo(FILEINFO_MIME_TYPE))->file($tmp);$dimensions=@getimagesize($tmp);
            if(!isset($types[$mime])||!$dimensions||$dimensions['mime']!==$mime||$dimensions[0]*$dimensions[1]>40000000)throw new InvalidArgumentException('Yalnızca geçerli JPG, PNG veya WebP fotoğrafları yükleyin.');
            $dir=bsRepairStorage();if(!is_dir($dir)&&!mkdir($dir,0700,true))throw new RuntimeException('Fotoğraf klasörü oluşturulamadı. Hosting yazma izinlerini kontrol edin.');
            $filename=bin2hex(random_bytes(20)).'.'.$types[$mime];$path=$dir.'/'.$filename;
            if(!move_uploaded_file($tmp,$path))throw new RuntimeException('Fotoğraf kaydedilemedi.');
            chmod($path,0600);$saved[]=['filename'=>$filename,'mime'=>$mime];
        }
        return $saved;
    }catch(Throwable $e){bsRepairRemoveUploads($saved);throw $e;}
}
function bsRepairRemoveUploads($files){foreach($files as $file){$path=bsRepairStorage().'/'.$file['filename'];if(is_file($path))unlink($path);}}
