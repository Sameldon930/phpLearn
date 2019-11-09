<?php
/**
 * 创建websocket服务器 
 */
$server = new Swoole\WebSocket\Server("172.16.22.157", 8812);
//定义函数  onOpen
//监听websocket连接打开事件
$server->on('open','onOpen');
function onOpen($server,$request){
    print_r($request->fd);
}
//监听websocket消息事件
$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    //向websocket推送数据
    $server->push($frame->fd, "success");
});
//关闭事件
$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();