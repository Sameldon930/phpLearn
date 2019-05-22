<?php
// 使用trait可以解决 php单继承的问题  创建完之后 在需要引用的类中进行use 即可
trait BT{
    public function atest(){
        echo "hello";
    }
    public function btest(){
        echo  "world";
    }
    public function ab(){
        $this->atest();
        $this->btest();
    }
}

class Test{
    use BT;
}

$test = new Test();
$test->ab();//helloworld

class TP{
    use BT;
}

$TP = new TP();
$TP->ab();//helloworld


trait A{
    public  function A(){
        echo "I";
    }
}
trait B{
    public function B(){
        echo "love";
    }
}

class C{
    use A,B;
    public function C(){
        echo "you";
    }
}

$c =  new C();
$c->a()


