<?php

/**
 * 
 * 面向对象
 * 
 */
class father{
    public function f(){
        echo 'fff';
    }
}

class son extends father{
    public function f(){
        parent::f();
        echo 'sss';
    }
    pub
}
$s = new son();
$a = $s->f();
var_dump($a);