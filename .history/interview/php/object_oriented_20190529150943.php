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
        echo 'sss';
    }
}
$s = new son();
$a = 
var_dump($s->f());