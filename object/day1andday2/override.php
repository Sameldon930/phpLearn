<?php
/**
 * 重写override
 * 
 * 子类重新定义父类继承给自己的属性或方法
 * 
 * 基本特征是：父类已经有的属性或者方法  子类用同样的名字重新定义  参数不能减少 必须和父类一致
 * 对于构造方法 没有参数的要求
 * 
 * 重写也叫覆盖
 * 
 * 重写的原因：一般来说 子类的特征信息的定义 一般比父类更详尽 
 *      父类没有的 子类可以有 例如添加特征信息
 *      父类有的 子类也可以有 但是子类可以最定义得更加详细
 */

 class Animal {
     public $blood = 0;
     public function eat(){
        echo '动物类的吃';
        $this->blood+=1;
     }
 }
 class pig extends Animal{
    public $blood = 1;//属性重写
     public function eat(){//方法重写
        echo '猪的吃';
        $this->blood+=2;
     }
 }
 class duck extends Animal{
    public $blood = 2;//属性重写
     public function eat(){//方法重写
        echo '鸭子的吃';
        $this->blood+=3;
     }
 }

/**
 * 重写的要求
 * 
 * 父类是 public  子类只能是public
 * 父类是 protected  子类只能是 protected  public
 * 父类是 private 子类不能重写覆盖
 */

 class A{
     public $name = '';
     protected $age = '';
     private $sex = '';
 }
 class B extends A{
      public $name = '1';
      protected $age = '1';
      private $sex = '1';
 }

 $b = new B();
 echo '<pre>';
 var_dump($b);
