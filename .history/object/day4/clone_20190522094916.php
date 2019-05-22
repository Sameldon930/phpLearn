<?php

/**
 * 
 * 对象的克隆  
 * 新对象 = clone 旧对象
 * 
 *  
 */
class A{
    public $na = 'zzs';
}
$a = new A();
$b = clone $a;//qi
var_dump($a);//1号对象
var_dump($b);//2号对象