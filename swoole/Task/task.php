<?php

/***
 *
 * websocket 基础类库
 *
 */
class task{

    const HOST = "0.0.0.0";
    const PORT = 9504;
    public $ws = null;

    public function __construct(){
        $this->ws  =  new swoole_websocket_server(self::HOST,self::PORT);
        //设置参数
        $this->ws->set([
            'worker_num'=>2,
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
        if($request->fd == 1){
            //两秒执行一次
            swoole_timer_tick(2000,function($timer_id){
//                echo "2s:timerId:{$timer_id}";
            });
        }
    }

    /**
     * 监听ws消息事件
     *
     */
    public function onMessage($ws,$frame){
        echo "ser-push-message:{$frame->data}\n";
        $ws->push($frame->fd,"server-push:".date("Y-m-d H:i:s"));
        $data = [
            'task'=>1,
            'fd'=>$frame->fd,
        ];
//         $ws->task($data);//执行方法onTask
//        每隔五秒去执行
        swoole_timer_tick(5000,function()use($ws,$frame){
            echo "5s-after\n";
            $i = 1;
            $ws->push($frame->fd,"server-time-after:".++$i);
        });
    }

    public function onTask($ws,$taskId,$workerId,$data){
        print_r($data);
        //耗时场景 10s
        sleep(10);
        return "on task finish";   //告诉worker
    }

    public function onFinish($ws,$taskId,$data){
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

$obj =  new task();
echo $obj;