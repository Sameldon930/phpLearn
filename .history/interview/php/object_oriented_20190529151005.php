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
        pare
        echo 'sss';
    }
}
$s = new son();
$a = $s->f();
var_dump($a);