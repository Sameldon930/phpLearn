<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/14
 * Time: 15:50
 */
/**
 * 类的继承
 * A类使用了B类的属性和方法   说明A继承了B
 *
 * 派生
 * A继承了B  也就是说   B派生出了A
 *
 * 父类  子类
 * 父是基类 也就是上一级的类
 * 子是继承类 派生类 下一级的类
 *
 * 单继承
 * 一个类只能从上一级的类继承他的信息  php大部分的面向对象都是单继承
 *
 *
 */
class animal {
    public  function  a (){
        echo 'aaa';
    }
}
class duck extends animal{
    public function  b(){
        echo 'bbb';
    }
}
$q  = new duck();
var_dump($q->a());//调用duck继承的类里面的a方法
var_dump($q->b());//调用duck的里面的b方法
