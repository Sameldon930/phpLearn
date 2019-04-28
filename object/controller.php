<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/4/14
 * Time: 21:50
 */
/**
 * 访问修饰控制符
 *
 * 修饰符就是用来表明 这个属性或者方法的 可访问成都的关键词
 * public   公有    谁都可以访问  类似var  var是public的同义词  但是var只能修饰属性  public 可以修饰方法和属性
 * private  私有    只有自己才可以访问
 * protected 保护   只有相关继承的类可以访问  a继承b  B继承c  ABC都可以访问
 *
 */

class con {
    public $a = '';
    private $b = '';
    protected  $c = '';

    function __construct($a,$b,$c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

}
