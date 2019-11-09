<?php
/**
 * 创建一个swoole---TCP服务端
 * 参数1 监听地址
 * 参数2 端口
 */

//构建Server对象   内网
$server = new Swoole\Server('172.16.22.157',9501);

//设置运行时参数
$server->set(array(
//    'daemonize' => true,//后台运行
));


/**
 * //注册事件回调函数  -----事件驱动--连接--onConnect
 * $server是服务端的对象
 * $fd是连接的文件描述符 发送数据和关闭连接时需要此参数
 */
$server->on('connect',function ($server,$fd){
    echo '有新的客户端连接，连接标识为--------'.$fd.PHP_EOL;
});

/**
 * //-----事件驱动--接收--onReceive
 * $reactor_id是来自于哪个reactor线程
 * $data，收到的数据内容，可能是文本或者二进制内容
 */
$server->on('receive',function ($server,$fd,$reactor_id,$data){
    echo '接收客户端信息---------'.$data.PHP_EOL;
    //接收之后 返回信息
    $server->send($fd,'服务端接收消息成功！');
});

/**
 * //-----事件驱动--关闭--onReceive
 * $server是服务端的对象
 * $fd是连接的文件描述符 发送数据和关闭连接时需要此参数
 */
$server->on('close',function ($server,$fd){
    echo '客户端关闭-------------'.$fd.PHP_EOL;
});

//启动服务器
$server->start();


