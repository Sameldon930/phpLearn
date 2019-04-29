<?php


/**
 * 静态属性 和静态方法
 *  所谓的静态 就是只属于这个类的属性和方法
 *  类中的属性名和方法名 用static
 *  写法
 *  static $属性名
 *  static function
 *
 *  使用：
 *  类名::$属性名
 *  类名::方法名
 */

class Math{
    static  $a = 0;
    static  function  b ($x,$y){
        $q =  $x * $x + $y*$y;
        return pow($q,0.5);

    }
}
$aaaa = Math::$a;//调用类中的静态属性
var_dump($aaaa);
$vvv = Math::b(2,2);//调用类中的静态方法
var_dump($vvv);
