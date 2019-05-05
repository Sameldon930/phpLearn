<?php

/**
 * 参数传值
 * 
 */
function run($a,&$b){
    echo $a++;
    echo $b++;
}

$a1 = 10;
$a2 = 10;

run($a1,$a2);
echo $a1;//10 值传递 不改变外部变量的值
echo $a2;//11 引用传递 会改变外部变量的值  只有变量才可以引用传递
