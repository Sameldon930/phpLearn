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
    // static $count;
    // return $count++;
    global $count;
    echo $count;
}

echo $count;//5
++$count;
echo $count;//6

echo get_count();
// echo get_count();
echo "<hr>";
/******************************************************* */

function mgFunc(){
    $c = 1;
    echo $c++;//先用后加
    
}
mgFunc();//1
