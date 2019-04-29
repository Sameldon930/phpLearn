<?php

/**
 * 重载 overload  ---  属性重载 在定义一个类的时候 预先定义4个方法，来应对使用不存在的属性的时候的措施
 * 
 * 使用一个对象或者类的时候 如果访问了其并没有定义的（即不存在的）的属性或方法
 * 则会使用某些预先定义好的特殊方法来应对这种情况
 * 
 * 是一种应对非法使用对象或类的措施
 */

/**
 * __set($name,$value)方法
 * 对一个对象不存在的属性进行赋值的时候 会自动被调用
 * 
 * __get($name,$value)方法
 * 对一个对象不存在的属性进行取值的时候 会自动被调用
 * 
 * __isset($name)方法
 * 对一个对象不存在的属性进行isset()判断 会被自动调用
 * 
 * __unset($name)方法   
 * 对一个不存在的属性进行unset的时候  会自动调用
 */

class Al{
    public $p1 = 1;
    //创建空数组 用来存储那些不存在的属性的赋值
    public $prop_list = array();
    function __set($name, $value){
        // echo '不存在！'.$name.'=>'.$value;
        $this->prop_list[$name] = $value;
        echo '<pre>';
        var_dump($this->prop_list);
    }
    function __get($name){//$name代表取值的不存在的属性
        
        if( !empty($this->prop_list[$name])  ){
            return $this->prop_list[$name];
        }else{
            return  '属性不存在！';
        }

    }
    function __isset($name)
    {
        if(isset($this->prop_list[$name])){//如果确实存在  返回真
            return true;
        }else{
            return false;
        }
    }
    function __unset($name)
    {
        unset($this->prop_list[$name]);
    }
}
$a = new Al();
$a ->p1 = 2;//对一个存在的属性进行赋值
$a ->p2 = 11;//对一个不存在的属性进行赋值

$a->p1;//对一个存在的属性进行取值
var_dump($a->p2);//对一个不存在的属性进行取值

var_dump(isset($a->p1));
unset($a ->p3);
var_dump($a->prop_list);


