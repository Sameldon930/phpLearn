<?php
使用trait可以解决 php单继承的问题  创建完之后 在需要引用的类中进行use ji'ke
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
$test->ab();

class TP{
    use BT;
}

$TP = new TP();
$TP->ab();
