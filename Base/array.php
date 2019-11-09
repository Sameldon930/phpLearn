<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/9
 * Time: 15:52
 */

//创建数组
$products1 = array('a','b','c'); //创建方法1
//$numbers = range(1,5);
//print_r($products1);
//创建方法2
$products2[0] = 'a';
$products2[1] = 'b';
$products2[2] = 'c';
//print_r($products2);
//创建方法3
$products3 = [
    'a'=>'A',
    'b'=>'B',
    'c'=>'C'
];
//print_r($products3);



//foreach
$arr = [];
foreach ($products2 as $current){
//    $arr[] = $current;//将$products2的数据放到$arr里面
//        echo $current;
}
//只能拿出最后一个值
//print_r($current);//c
//print_r($arr);//输出$arr
foreach ($products3 as $k =>$item) {
//    echo $k.'-'.$item."<br />";
}

//数组排序
$sort = array('9','2','1');
//sort($sort);
//print_r($sort);


/**
 * 数组排序函数
 *
 * sort 按照字母升序排序
 *
 * asort 按照值升序排序
 *
 * ksort 按照key升序排序
 *
 * rsort 按照字母倒序排序
 *
 * arsort 按照值倒序排序
 *
 * krsort 按照key倒序排序
 *
 * usort  用户自定义排序  第二个参数 是自己排序的方法  usort(要排序的数组,compare)
 *
 * shuffle 随机排序
 *
 * array_reverse 反向排序
 *
 * 增加元素到数组  array_push
 *
 * 删除元素到数组  array_pop
 *
 * explode 字符串转数组  根据字符串中的某个字符为分隔
 */


