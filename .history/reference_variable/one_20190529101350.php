<?php

/**
 * 引用变量的相关知识
 * 
 */

$a = range(1,1000);//一个数组 1到1000
var_dump(memory_get_usage());

$b = $a;
var_dump(memory_get_usage());

$a = range(1,1000);
var_dump(memory_get_usage());

echo "<hr>";

$c = range(1,1000);
var_dump(memory_get_usage());
$d = &$c;
var_dump(memory_get_usage());
$c = range(1,1000);
var_dump(memory_get_usage());
echo "<hr>";
/******************************************************* */

$one = 1;

$two = &$one;

unset($two);

echo $one;
echo "<hr>";
/******************************************************* */

$data = ['a','b','c'];

foreach($data as $key=>$value){
    $value = $
}