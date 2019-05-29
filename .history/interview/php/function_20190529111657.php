<?php

/**
 * 
 * 自定义函数和内部函数
 * 
 */
$count = 5;

function  get_count(){
    static $count;
    return $count++;
}

echo $count;
++$count;

echo