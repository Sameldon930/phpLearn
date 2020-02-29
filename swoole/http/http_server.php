<?php
$http = new swoole_http_server("0.0.0.0",9503);

//设置 开启处理静态资源配置  以及根目录路径  这样就可以访问 根目录下的所有静态资源 地址：端口/静态资源地址
$http->set([
    'enable_static_handler'=>true,
    'document_root'=>"/project/phpLearn/swoole/data"
]);
//每次请求到这个服务端 就记录日志到文件中
$http->on('request',function($request,$response){
    $content = [
        'date:'=>date("Ymd H:i:s"),
        'get:'=>$request->get,
        'post:'=>$request->post,
        'header:'=>$request->header
    ];
    swoole_async_writefile(__DIR__."/access.log",json_encode($content).PHP_EOL,function($filename){
        echo '写入日志成功';
    },FILE_APPEND);
    //发送数据到页面
    $response->end("sss".json_encode($content));
});
$http->start();