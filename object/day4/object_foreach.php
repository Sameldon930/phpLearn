<?php
/**
 * 对象的遍历
 * 
 * 只能遍历可访问的属性
 * foreach
 */
class A{
    public $p1 = 2;
    protected $p2 = 3;
    private $p3 = 4;
    static $p4 = 5;
    //用来显示对象的所有属性
    function showAll(){
        foreach($this as $prop => $value){
            echo "<br/属性$prop:$value>";

        }
    }
}

$a = new A();
//遍历该对象 会一次次的获取该对象的属性
//并将属性名赋值给$prop 属性值赋值给value
foreach($a as $prop => $value){
    echo "<br/属性$prop:$value>";
}  
$a->showAll();
var_dump($a);

