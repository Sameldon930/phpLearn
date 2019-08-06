<?php
$http = new swoole_http_server("0.0.0.0",8899);


$http->set([
    'enable_static_handler'=>true,
    'document_root'=>"/data/www"
]);
$http->on('request',function($request,$response){
    $response->end("sss".json_encode($request->get));
});
$http->start();