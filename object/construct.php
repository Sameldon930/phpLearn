<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/14
 * Time: 14:58
 */

/**
 * 构造方法
 * 在类中定义的 在实例化类的时候  会自动调用的方法
 * 方法名字   __construct
 *
 * 通常用来 简化对象属性的初始化工作 还有一些要自动处理的 也可以写入里面
 */
class construct{
    var $aa ;
    public  function __construct($a,$b){
        $this->aa = $a;
    }
    function  aaa(){
        echo $this->aa;//this调用构造函数中的变量
    }

}
$a  = new construct('1','') ;
var_dump ($a->aaa());