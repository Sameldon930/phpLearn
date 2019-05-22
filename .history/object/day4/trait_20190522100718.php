<?php

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
$TP->ab()；
