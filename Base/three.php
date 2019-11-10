<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/10
 * Time: 14:34
 */
/**
 * require()
 * include()
 * 两者区别在于 require如果出现问题 会出现致命错误 不再运行之后的代码
 * include出现问题 会出现警告 并继续执行
 *
 * auto_prepend_file   auto_prepend_file=""
 * auto_append_file    auto_append_file=""
 * 通过这两个进行设置页眉和脚注
 *
 */
function larger($x,$y){
    if(!isset($x) || !isset($y)){
        return $x.'==='.$y;
    }
    if(isset($x) && isset($y)){
        return $x.'==='.$y;
    }
}
$x = '0';
$y = '0';
$res = larger($x,$y);
//echo $res;

function reverse($str){
    if(strlen($str)>0){
        reverse(substr($str,1));
    }
    echo substr($str,0,1);
    return;
}
$res = reverse("*******");
print_r($res);