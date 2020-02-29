<?php
/**
 * 假设要访问10个url
 * 如果是同步的话 一个url 假设要1秒 那么就需要一共 10秒
 *
 * 现在创建异步  是个url 所消耗的时间 只需要同步的十分之一
 */
//记录开始时间
echo "start".date("H:i:s").PHP_EOL;
$works = [];
$urls = [
    "http://www.baidu.com",
    "http://www.sina.com",
    "http://www.qq.com",
    "http://www.baidu.com?search=zzs1",
    "http://www.sina.com?search=zzs2",
    "http://www.sina.com?search=zzs3",
    "http://www.sina.com?search=zzs4",
    "http://www.sina.com?search=zzs5",
    "http://www.sina.com?search=zzs6",
    "http://www.sina.com?search=zzs7",
];
//这是通常处理的方法 也就是同步的处理方式-----  此时消耗10秒
//foreach ($urls as $url){
//    $content[] = curlData($url);
//}
//var_dump($content);


/**
 * 创建子进程 进行处理
 * 循环6次 每次创建子进程 进程中进行curl请求  消耗1秒
 */
for($i = 0;$i<10;$i++){
    //创建
    $process = new swoole_process(function (swoole_process $worker) use($i,$urls){

        //进行模拟请求  将$i当作下标 依次请求url
        $content = curlData($urls[$i]);

        //将内容输入到管道  这是方法1
        //echo $content.PHP_EOL;

        //将内容输入到管道  这是方法2
        $worker->write($content.PHP_EOL);
    },true);
    //开启
    $pid = $process->start();
    $works[$pid] = $process;
}
//此时是将进程内容输入到管道中 因此在这里进行获取管道内容
foreach($works as $work){
    //读取输入到管道里面的信息
    echo $work->read();
}
/**
 * 模拟请求上面的url
 * @param $url
 */
function curlData($url){
    sleep(1);
    return $url."success".PHP_EOL;
}
//记录开始时间
echo "finish".date("H:i:s").PHP_EOL;