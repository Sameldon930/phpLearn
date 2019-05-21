<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/14
 * Time: 14:53
 */
/**
 * 类常量   和类中的变量不同  必须要赋值
 * 放在一个类中  只能由这个类调用
 * const  常量名
 * 调用  类名::常量名
 */
class normal{
    const zzs = 111;
}
const a = 'zzzs';
var_dump(a);


$n = new normal();
echo $n::zzs;
