<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/13
 * Time: 17:21
 */
/**
 * $this 代表调用当前方法的对象
 * 只能用于在一个类定义语法的内部  通常不在静态方法中(无法使用)
 *
 * self  代表当前单词所在的类的本身   既可以用在静态方法中 也可以用在普通方法中
 * 只能用于在一个类定义语法的内部
 */
class total {
    static  $a = '1';
    var $b = '2';
    function  b_f(){
        echo 'b_f';
        var_dump($this->b);//类中用this调用属性
        var_dump(self::$a);//类中用self调用静态属性
    }

    static function  a_f(){
        echo 'a_f';
        var_dump(self::$a);//类中用self调用静态属性
//        var_dump($this->b);//类中用$this调用属性  会报错
    }

}

$t =  new total();
var_dump($t->b_f());//调用方法
$t->b;//调用b属性

total::$a;//调用静态属性
total::a_f();//调用静态方法
var_dump(total::a_f());//调用静态方法





