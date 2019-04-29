<?php
/**
 * 单例模式
 * 
 * 多次调用 只能实例化同一个对象 
 * 不会重复
 */
class single{
    //定义一个私有的静态属性用来装一个对象  外界无法访问
    private static $s = null;
    //私有构造方法 不让外界new对象
    private function __construct()
    {
        
    }
    //给外界提供一个方法  让他从这个方法来获得一个对象
    static function Getone(){
        if(empty(self::$s)){//如果还没被实例过
            self::$s =  new self();
            return self::$s;

        }else{
            //否则就直接返回刚才的对象
            return  self::$s;
        }
    }
}
$obj = single::Getone();
$obj1 = single::Getone();
var_dump($obj);
var_dump($obj1);

