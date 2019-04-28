<?php
class know {
    var $ccc = 123;//本质是变量 在类中就是类的属性  必须用var 或者  public private protected 等  用法：  对象->属性名
    public  function  b(){//类的方法  也就是函数    用法：对象->方法名
echo  111;
}
}

$a = new know();
echo 111;

print_r($a->b());//111
print_r($a->ccc);//123
