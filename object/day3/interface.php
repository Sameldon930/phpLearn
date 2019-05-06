<?php
/**
 * 
 * 接口 关键字 interface
 * 
 * 是比抽象类更抽象的类似的一种结构
 * 接口中 只有这两种成员 常量和抽象方法
 * 
 * 接口类中的方法都是抽象类 但是不需要用 abstract这个关键字来声明
 * 
 * 为什么需要接口 
 * 面向对象的单继承是对‘现实世界’的多继承现象的一种妥协 为了不使代码过于复杂
 * 但有时候 又往往需要多继承的情形需要描述
 * 于是 使用接口这种技术 可以做到多继承
 * 
 * 接口中的常量和抽象方法 都只能是public 而且不用写
 * 抽象方法 无需使用abstract
 * 
 * 
 * 对接口的继承 不叫 extends  而叫实现 implements
 * 
 * class 类 implements 接口1,接口2,接口3{
 * 
 * }
 */

 //演示接口的使用

interface Player{
     function play();
     function next();
     function prev();
     function stop();


 }

 interface Usb{
    const width = 12;
    const heigt = 5;
    function data_in();
    function data_out();
 }
//zzs 实现 以上两个接口中的抽象方法
 class zzs implements Player,Usb{
    function play(){}
    function next(){}
    function prev(){}
    function stop(){}
    function data_in(){}
    function data_out(){}
 }

 /**
  * 另外  
  * 一个类 也可以继承其他类 并同时实现 其他接口  
  */
  class A extends B implements Player,Usb{

  }
  //接口之间也可以进行继承  可以实现多继承

  interface zz extends Player,Usb{

  }