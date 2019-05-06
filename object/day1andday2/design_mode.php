<?php
/**
 * 设计模式
 * 
 * 设计模式1 工厂模式
 * 设计一个工厂类 可以接收一个参数 该参数代表某个类名 比如B  然后这个工厂类就可以生产出传过来的类B的对应的对象
 * 
 * 
 */

 /**************** 工厂模式*/
class A{}

class B{}

//用来生产各种类的对象 因为类只是直接调用方法别无他用  因此用静态方法
class factory{
    static function GetObject( $class_name){
        $obj = new $class_name();
        return $obj;
    }
}

$a = factory::GetObject('A');
$b = factory::GetObject('B');
var_dump($a);
var_dump($b);


 /**************** 工厂模式*/
