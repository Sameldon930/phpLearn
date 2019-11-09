<?php
$http = new swoole_http_server("172.16.22.157",9001);


$http->set([
    'enable_static_handler'=>true,
    'document_root'=>"/data/www"
]);
$http->on('request',function($request,$response){
    $content = [
        'date:'=>date("Ymd H:i:s"),
        'get:'=>$request->get,
        'post:'=>$request->post,
        'header:'=>$request->header
    ];
    swoole_async_writefile(__DIR__."/access.log",json_encode($content),function($filename){
        echo '12';
    },FILE_APPEND);
    $response->end("sss".json_encode($request->get));
});
$http->start();