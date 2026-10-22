<?php
function bsRepairWhatsAppConfigured(){
    foreach(['BS_WA_ACCESS_TOKEN','BS_WA_PHONE_ID','BS_WA_TEMPLATE','BS_WA_GRAPH_VERSION'] as $k)if(!getenv($k))return false;
    return function_exists('curl_init');
}
/** Provider acceptance is recorded separately from delivery; no delivery claim without webhook. */
function bsRepairNotify(Repair $model,$eventId,$transport=null){
    if(!$eventId)return;$event=$model->event($eventId);
    if(!$event||!$event['consent']||$event['notification']!=='pending')return;
    if(!$transport&&!bsRepairWhatsAppConfigured())return;
    if(!$model->claim($eventId))return;
    try{
        if($transport)$result=$transport($event);
        else{
            $version=getenv('BS_WA_GRAPH_VERSION');$phoneId=getenv('BS_WA_PHONE_ID');
            if(!preg_match('/^v\d+\.\d+$/D',$version)||!ctype_digit($phoneId))throw new RuntimeException('Configuration');
            // Approved utility template must have one body text parameter, with no header/buttons.
            $payload=['messaging_product'=>'whatsapp','to'=>$event['phone'],'type'=>'template','template'=>['name'=>getenv('BS_WA_TEMPLATE'),'language'=>['code'=>getenv('BS_WA_LANGUAGE')?:'tr'],'components'=>[['type'=>'body','parameters'=>[['type'=>'text','text'=>$event['message']]]]]]];
            $ch=curl_init('https://graph.facebook.com/'.$version.'/'.$phoneId.'/messages');
            curl_setopt_array($ch,[CURLOPT_POST=>true,CURLOPT_RETURNTRANSFER=>true,CURLOPT_CONNECTTIMEOUT=>5,CURLOPT_TIMEOUT=>15,CURLOPT_HTTPHEADER=>['Authorization: Bearer '.getenv('BS_WA_ACCESS_TOKEN'),'Content-Type: application/json'],CURLOPT_POSTFIELDS=>json_encode($payload,JSON_UNESCAPED_UNICODE)]);
            $raw=curl_exec($ch);$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);curl_close($ch);
            if($raw===false){$model->notification($eventId,'unknown');return;}
            $response=json_decode($raw,true);$result=($code>=200&&$code<300&&!empty($response['messages'][0]['id']))?['state'=>'accepted','id'=>$response['messages'][0]['id']]:['state'=>'failed'];
        }
        $model->notification($eventId,$result['state'],$result['id']??null);
    }catch(Throwable $e){$model->notification($eventId,'unknown');}
}
