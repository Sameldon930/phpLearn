<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/14
 * Time: 15:24
 */

/**
 * 析构方法
 * 在类中的一个方法  在一个对象被销毁后 会自动调用的方法
 * 方法名  destructor
 * 不能带参数
 */

/**
 * 对象什么时候被销毁：
 *          代码执行结束被销毁
 *          一个对象没有变量引用它的时候
 */
class  destructor{
    public function __destruct()
    {
        echo  111;
    }
}
$a = new destructor();
$a = new destructor();
$a = new destructor();
$a = new destructor();