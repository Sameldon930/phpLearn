<?php

/**
 * 
 * 自定义函数和内部函数
 * 
 * 函数内部使用 外部变量 使用global
 * 
 */
$count = 5;

function  get_count(){
    static $count;
    return $count++;
    
}

echo $count;//5
++$count;

echo get_count();//null
echo get_count();//null++  等于1 
echo "<hr>";
/******************************************************* */

function mgFunc(){
    $c = 1;
    echo $c++;//先用后加
    echo $c;//2
}
mgFunc();//1
echo "<hr>";
/******************************************************* */

function &zzs(){
    static $b = 10;
    return $b;
}
$a = zzs();
$a = &zzs();//此时a 已经等价于 b
$a = 100;//把a改为100
echo zzs();//所以此时  b也是100

echo "<hr>";
/******************************************************* */

/**
 * 
 */
