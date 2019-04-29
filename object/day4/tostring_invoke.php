<?php
/**
 * 
 * __tostring() 将一个对象当作一个字符串来使用的时候 会自动调用
 * 
 * __invoke()   将一个对象当作一个函数来使用的时候 会自动调用
 */

 class A{
     public $name = 'zz';
     protected $age = 22;

     //当对象被当作字符串来使用的时候 进行调用
     function __toString()
     {
         echo "对象被当作字符串来使用";
     }

 }

//  $a = new A();
//  //将对象做字符串来使用
//  echo '111'. $a;

 class B{
     function __invoke()
     {
         echo '我是一个对象 不要当我是函数';
     }
 }
 $b = new B();
 //将对象当作函数来使用
 $b();