<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/10
 * Time: 15:15
 * 面向对象
 */
/**
 * 类
 * 声明：
 * class name{}
 *
 * public 谁都可以访问
 * private 私有  只有自己
 * protected 自己和子类
 *
 * 重载
 *
 * clone 克隆一个对象
 *
 * __call() 重载方法
 *
 * __autoload() 实例化一个还没有生命的时候调用
 *
 * __toString()  类转字符串
 */



//类的实例化  构造函数传参  __get __set 首先外部对类的属性的访问
class A{
    private $obj;
    public function __construct($params)
    {
        printf('父类收到了参数 %s',$params);
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    final function father(){
        echo 1111;
    }
}

//重载  子类复制父类的方法名 并修改内容 但不会影响到父类方法内容
class B extends  A{
    public function __construct($params)
    {
//        printf('子类收到了参数 %s',$params);
//        parent::__construct($params);//重载中继续调用父类方法
    }
//    public function father(){
//        echo 222;
//    }
//        public function __toString()
//        {
//            // TODO: Implement __toString() method.
//            return var_export($this,true);
//        }
}

//禁止继承和重载 final

//$a = new B("first");//我收到了参数 first  此时就不需要赋值接收
//echo $a->father();


//实现多重继承  通过接口实现  start

interface Displayable{
//    function display();
    static function display();
}
class webPage implements Displayable{
    static function display()
    {
        return "webPage"."de"."hello";
    }
}

$page = new webPage();
//echo $page->display();//
class webPage2 extends webPage implements Displayable{
    //重载
    static function display()
    {
        return "webPage2"."de"."hello";
    }
}

//$page = new webPage2();
//echo $page->display();//继承了webPage 并且和webPage都多重继承了Displayable

//实现多重继承  通过接口实现  end
//调用类的静态方法 就不需要先实例化 直接调用即可  并且不能使用this关键字
//echo webPage2::display();

