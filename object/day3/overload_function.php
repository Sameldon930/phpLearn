<?php

/**
 * 重载 overload  ---  方法重载 当对一个未定义的方法进行调用的时候 会自动调用 预先设定的好的魔术方法
 * 
 * 使用一个对象或者类的时候 如果访问了其并没有定义的（即不存在的）的属性或方法
 * 则会使用某些预先定义好的特殊方法来应对这种情况
 * 
 * 是一种应对非法使用对象或类的措施
 */

/**
 * __call()
 * 当对一个对象未定义的实例方法进行调用的时候 会自动调用预先定义好的魔术方法
 * 
 * __callstatic()
 * 当对一个对象未定义的静态方法进行调用的时候 会自动调用预先定义好的静态魔术方法
 */

 class A{
     public function a1(){
         echo '<p>a1实例方法';
     }
     //第一个参数表示不存在的方法名字 
     //第二个参数表示调用不存在的方法时的所有实参 是一个数组 array
     function __call($name, $arguments)
     {
         var_dump($name);//输出调用不存在的方法的名字
         var_dump($arguments);//输出调用不存在方法的时候 传的参数  并装成一个数组
         if($name == 'eat'){
            $num = count($arguments);
            if($num == 1){//调用喝粥方法
                $this->hezhou($arguments[0]);
            }else{
                $this->chifan($arguments[0],$arguments[1]);
            }
         }
     }
     function hezhou($p1){
        echo '一口吃完'.$p1;
     }
     function chifan($p1,$p2){
        echo '使用'.$p2.'一口吃完'.$p1;

     }

     //静态魔术方法
     static function __callStatic($name, $arguments)
     {
         
     }
 }
 $a = new A();
 var_dump($a->a1());
 var_dump($a->a12('1','2','3'));
$a->eat('1');
