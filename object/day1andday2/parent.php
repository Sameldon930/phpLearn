<?php
/**
 * parent 关键字  
 * 用在子类中 访问父类的方法或属性
 * 
 * 用法：  
 * parent::属性或方法
 * 或
 * 父类名字::属性或方法
 * 
 */

 class A {
     public $name ='';
     public $age ='';
     public $sex ='';

     public function __construct($name,$age,$sex){
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;

     }  
 }

class B extends A{
    
    //接受参数
    public function __construct($name,$age,$sex)
    {
        //调用父类的构造方法  两种方法 一种是直接类名 一种是parent
        A::__construct('1','2','3');
        parent::__construct('4','5','6');

        
    }
}
 $a = new  B('ZZS','','');
var_dump($a) ;