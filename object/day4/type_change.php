<?php

/**
 * 
 * 对象的类型转换 
 * 
 * 对象转对象 没有变化
 * 数组转对象 键名当作属性名 值为对应值  整数下标的单元 转换为对象的属性后  无法操作
 * null转换为对象 空对象
 * 其他标量数据转换为对象 属性名为固定的‘scalar’  值为该变量的值
 * 
 */

$s = new stdClass();

$conf = array(
    'host'=>'localhost',
    'user'=>'root',
    'pass'=>'root'
);
$c = (object)$conf;//强制类型转换   数组转对象

var_dump($c);
/***其他标量数据转换为对象  */  //属性名都是 scalar
$v1 = 2;   $v1c = (object)$v1;//整型转对象
$v2 = 2.2;   $v2c = (object)$v2; //浮点转对象
$v3 = "abc";   $v3c = (object)$v3; //字符串转对象
$v4 = true;   $v4c = (object)$v4; //布尔型转对象 
echo '<pre>';
var_dump($v1c);
var_dump($v2c);
var_dump($v3c);
var_dump($v4c);
