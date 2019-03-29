<?php

 

/**
 * 查询快递物流的接口    来自  聚合数据https://www.juhe.cn
 * com  快递英文简称
 * no 快递单号
 * key 申请后获得的key
 * 
 * get请求
 */


$com = 'ems';
$no = '9895098690856';
$key = '01e309d8772c928ca991fcdb57fc1ce8';
$url = 'http://v.juhe.cn/exp/index?key='.$key.'&com='.$com.'&no='.$no;

$res = file_get_contents($url);
echo '<pre>';
var_dump(json_decode($res,true));

//微信个码
//微信固码