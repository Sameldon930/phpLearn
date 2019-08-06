<?php

/***
 * 
 * websocket 基础类库
 * 
 */
class WS{

    const HOST = "172.16.22.157";
    const PORT = 8812;
    public $ws = null;
    
    public function __construct(){
        $this->ws  =  new swoole_websocket_server("172.16.22.157");
        //设置参数
        $this->ws->set([
            'woker_num'=>2,
            'task_worker_num'=>2
        ]);
        $this->ws->on("open",[$this,'onOpen']);
        $this->ws->on("message",[$this,'onMessage']);
        $this->ws->on("close",[$this,'onClose']);
        //task任务
        $this->ws->on('task',[$this,'onTask']);
        $this->ws->on('finish',[$this,'onFinish']);
        $this->ws->start();
    }

    /**
     * 监听ws连接事件
     */
    public function onOpen($ws,$request){
        var_dump($request->fd);
    }

    /**
     * 监听ws消息事件
     * 
     */
    public function onMessage($ws,$frame){
        echo "ser-push-message:{$frame->data}\n";
        $data = [
            'task'=>1,
            'fd'=>$frame->fd,
        ];
        $ws->task($data);//执行方法onTask
        $ws->push($frame->id,"server-push:".date("Y-m-d H:i:s"));
    }

    public function onTask($serv,$taskId,$workerId,$data){
         //耗时场景 10s
        sleep(10);
        return "on task finish";   //告诉worker
    }

    public function onFinish($serv,$taskId,$data){
        echo "taskId:{$taskId}\n";
        echo "finish-data-success:{$data}\n";
    }
    /**
     * 关闭事件
     */
    public function onClose($ws,$fd){
        echo "clientid:{$fd}\n";
    }
}

$obj =  new WS();
echo $obj;