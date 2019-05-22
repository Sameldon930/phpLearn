<?php

/**
 * 
 * 类型约束
 * 
 * 只能在函数或方法的形参上进行约束
 * 只能对数组 对象 类和接口进行约束
 * 
 * 数组：使用array关键字
 * 类：使用要求传递过来的实参对象必须是该类的对象
 * 接口：要求传递过来的实参对象必须是实现了该接口的对象
 */

 class A{
    public function nam(){
        echo '111';
    }
 }
 interface I1{}
    class b implements I1{}
 function f1($p1,Array $p2,A $p3, I1 $p4){
    //此时 p1没有约束  p2必须是传过来的是数组
    //p3必须是类A的对象 
    //p4必须是实现了接口 I1的对象
 }
 //实例化
 $a = new A();
 $b = new b();
 //调用函数
//  f1(1,2,3,4);//此时不满足约束 会报错 从第二个参数开始报错 表示第二个参数必须是数组
//  f1(1,array(
//      'host'=>'1111','sss'=>'2222'
//  ),3,4);//此时不满足约束 会报错   must be an instance of A  表示必须是A的实例（也就是A被实例化的对象）
 f1(1,array(
     'host'=>'1111','sss'=>'2222'
 ),$a,$b);//此时报错第四个参数   must implement interface I1  必须是实现接口I1的对象  (也就是继承实现I1的类)


