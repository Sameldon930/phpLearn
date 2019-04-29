<?php
/**
 * 
 * 其他魔术方法
 * 
 * 与类相关的函数
 * class_exists()  判断某个类是否存在
 * interface_exists()  判断某个接口是否存在
 * get_class($对象) 获得一个对象的所属类
 * get_parent_class($对象) 获得一个对象的所属类的父类
 * get_class_methods(类名) 获得一个类的的所有方法名 结果是一个数组
 * get_class_vars(类名) 获得一个类的所有属性名 结果是一个数组
 * get_declared_classes()  获得所有类名
 * 
 * 与对象有管的系统函数
 * 
 * is_object() 判断是否是对象类型
 * get_object_vars($对象) 获得一个对象的所有属性 不包含静态属性
 * 
 * 与类相关的运算符
 * new 创建一个类的对象（实例）
 * instanceof 判断一个对象（变量） 是否是某个类的对象
 * 
 * 
 */
//演示

class A{
    function f1(){
        echo '当前这个类'.__CLASS__;
        echo '当前方法为'.__METHOD__;
        echo '当前目录'.__DIR__;
        echo '当前文件'.__FILE__;
        echo '当前行为'.__LINE__;

    }
}

$a = new A();

var_dump($a->f1());

//instanceof 判断一个对象（变量） 是否是某个类的对象  是返回true 否返回false
//演示
class hh {
}
class hao extends hh{
}
$v1 = 1;
$v2 = new hh();
$v3 = new hao();
$res = $v1 instanceof hh;//v1不是hh的对象 所以 返回false
var_dump($res);


