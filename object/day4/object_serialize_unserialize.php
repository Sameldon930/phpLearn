<?php

/**
 * 
 * 对象的序列化和反序列化技术
 * 
 * 对象在进行序列化的时候 会自动调用类中的魔术方法  __sleep()  前提有这个方法
 * 对象在进行反序列化的时候  会自动调用类中的魔术方法   __wakeup()  前提有这个方法
 * 
 * 
 * 对于对象的序列化 如果__sleep()方法  此时w我们就可以人为控制序列化的细节
 * 在这个方法中必须返回一个数组 该数组存储了该对象要进行序列化的属性名
 * 也就是 序列化的时候  可以选择哪些属性序列化
 */

 //举例  设计一个类  有三个属性 并实例化一个对象
 //将这个对象进行序列化 并控制只序列化其中两个属性 
 //然后在反序列 进行观察

 class time{
    public $n1 = 1;
    public $n2 = 2;    
    public $n3 = 3;    

    function __sleep(){//进行序列化的时候  会调用到的方法 __sleep() 
        //希望对象只序列化 n1 n3
        return array("n1","n3");
    }
 }

 $t = new time();

 $t->n1 = 11;
 $t->n2 = 22;
 $t->n3 = 33;

 //将这个对象进行序列化
 $str = serialize($t);
 //写入文件
 file_put_contents('./ob.txt',$str);

 //反序列化
 $zz = file_get_contents('./ob.txt');
 $res = unserialize($zz);
 var_dump($res);