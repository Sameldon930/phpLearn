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

    }
}
$s = new son();

var_dump($s->f());