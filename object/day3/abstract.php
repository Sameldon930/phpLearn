<?php

/**
 * 抽象类  一个不能被实例化的类
 * 
 * abstract 类名
 * 
 * 抽象方法  什么也不做的方法  基本上跟抽象类一起使用  没有方法体  只有方法头
 * abstract function 方法名（形参1，形参2）
 * 
 * 抽象类和抽象方法的关系
 * 
 * 一个类中有抽象方法 该类就是抽象类
 * 
 * 一个抽象类中可以没有抽象方法
 * 
 * 子类继承于一个抽象类 
 * 要么子类必须实现父类中的所有抽象方法 
 * 要么子类也做抽象类，此时可以不实现父类的抽象方法 当然去实现也可以
 * 
 * 子类实现抽象父类的方法 访问控制修饰符的范围不能降低 且方法的参数必须一致 相当于重写
 */

 abstract class Animal {
    protected $blood = 100;
    function Attack(){
        echo '发动攻击';
        $this->blood--;
    }
    abstract function a();
 }
 class tiger extends Animal{
     function Attack()
     {
         echo  '老虎发动攻击';
         $this->blood-=2;
     }
 }

 class fish extends Animal{
    function Attack()
    {
        echo  '鱼发动攻击';
        $this->blood-=1;
    }
}




