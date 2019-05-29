<?php

/**
 * 
 * 自定义函数和内部函数
 * 
 * 函数内部s
 * 
 */
$count = 5;

function  get_count(){
    static $count;
    return $count++;
}

echo $count;//5
++$count;
echo $count;//6

echo get_count();
echo get_count();
