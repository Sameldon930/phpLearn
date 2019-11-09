<?php
/**
 * 创建服务端B

 */

//构建Server对象   内网
$server = new Swoole\Server('172.16.22.157',9801);

//设置运行时参数
$server->set(array(
//    'daemonize' => true,//后台运行
));

/**
 * //-----事件驱动--接收--onReceive
 * $reactor_id是来自于哪个reactor线程
 * $data，收到的数据内容，可能是文本或者二进制内容
 */
$server->on('receive',function ($server,$fd,$reactor_id,$data){
    echo '接收服务端A信息---------'.$data.PHP_EOL;
    //服务端B
    //接收之后 返回信息
    $server->send($fd,'服务器B给你返回信息！');
});


//启动服务器
$server->start();


