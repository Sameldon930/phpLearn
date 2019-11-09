<?php
//var_dump($_GET);
////获取经纬度
//if(isset($_GET['latlon'])){
//    $loc = explode(',',$_GET['latlon']);
//    print_r($loc);
//}
$x = 28.183483;
$y = 112.977089;
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//某一个区域店长店铺添加平台
//var_dump($redis->geoAdd("location",0,0,'location'));
//var_dump($redis->geoAdd("zhangzeshan",112.977089,28.183483,'total'));
//var_dump($redis->geoAdd("zhangzeshan",112.977110,28.183500,'total1'));
//var_dump($redis->geoPos("zhangzeshan",'total'));
//var_dump($redis->geoPos("zhangzeshan",'total1'));
//距离计算

//获取当前key存了多少的位置
//var_dump($redis->zRange('zhangzeshan',0,-1));


//距离计算（两个点距离）
//var_dump($redis->geoDist("zhangzeshan",'total','total1','m'));
//基于一个点计算距离

//距离排序   使用redisd的原生命令  WITHDIST中心点  升序排序 只需要获取五条
var_dump($redis->rawCommand('GEORADIUS','location',112.977089,28.183483,10,'km','WITHDIST','ASC','count','5'));