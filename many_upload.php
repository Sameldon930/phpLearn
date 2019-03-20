<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19 0019
 * Time: 14:26
 */
header('Content-type:text/html;charset=utf-8');
echo '<pre>';

// 不同名字的文件处理方式
// foreach($_FILES as $value){
//     //找到临时文件的路径 并存放到对应的位置
//     if(is_uploaded_file($value['tmp_name'])){
//         //进行存储
//         move_uploaded_file($value['tmp_name'],'uploads/'.$value['name']);
//     }else{
//         echo  "文件上传失败！";
//     }
// }

//同名文件的处理方式
//判断是否存在并且是否一个数组
var_dump($_FILES['image']['name']);
if(isset($_FILES['image']['name']) && is_array($_FILES['image']['name'])){
    $images = array();
    foreach($_FILES['image']['name'] as $key => $value){
        $images[] = array(
            'name' => $value,
            'tmp_name'=>$_FILES['image']['type'][$key],
            'type'=>$_FILES['image']['tmp_name'][$key],
            'error'=>$_FILES['image']['error'][$key],
            'size'=>$_FILES['image']['size'][$key]
        );
        
    }       
}
print_r($images);