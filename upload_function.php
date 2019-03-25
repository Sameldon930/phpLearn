<?php
// 上传功能的封装方法
//单文件
/**
 * 参数1 array $allow_type  允许上传的MIME类型
 * 参数2 string $path  存储路径
 * 参数3 array $allow_format  允许上传的文件格式
 * 参数4 string &$error  如果出现错误的原因
 * 参数5  int $max_size = 2000000 允许上传的最大值
 * 参数6 array $file 需要上传的文件信息  一维数组 五元素(name,tmp_name,error,type,size)
 */

 header('Content-type:text/html;charset=utf-8');


function single_upload($file,$allow_type,$path,$allow_format=array(),&$error,$max_size= 2000000){
    //判断所上传的文件是否有效
    
    if(!is_array($file) ||  !isset($file['error'])){// isset — 检测变量是否已设置并且非 NULL
        //文件无效
        $error = '不是一个有效的上传文件!';
        return false;
    }
    //判断文件存储的路径是否有效
    if(!is_dir($path)){//is_dir — 判断给定文件名是否是一个目录
        //说明文件路径不对
        $error = '文件存储路径无效!';
        return false ;
    }
    //判断文件上传过程中是否出错
    switch($file['error']){
        case 1:
        case 2:
            $error = '文件超出允许最大值!';
            return false;
        case 3:
            $error = '文件上传中出现问题!';
            return false;

        case 4:
            $error = '没有选中要上传的图片!';
            return false;

        case 6:
        case 7:
            $error = '文件保存失败';
           
    }
    //判断MIME类型
    //判断是否存在允许上传的MIME类型数组中
    if(!in_array($file['type'],$allow_type)){
        //该文件类型不允许上传
        $error = '当前文件类型不允许上传';
        return false;

    }
    //判断后缀名, 也就是判断文件的类型是否符合
    //取出后缀
    //ltrim 去除字符串(在这里的字符串是'.')开头的左边的内容
    // strrchr — 查找指定字符(在这里的字符是'.')在字符串中的最后一次出现
    $str = strrchr($file['name'],'.');//找打.的位置
    $ext  = ltrim($str,'.');//去掉.的左边内容 然后拿去判断
    if(!empty($allow_format) && !in_array($ext,$allow_format)){
        $error = '文件的格式不支持上传!';
        return  false;
    }  
    
    //判断当前文件的大小是否满足需求
    if($file['size']>$max_size){
        $error = '当前上传的文件超出大小!'.$file['size'];

    }
    //构造移动后的文件名: 类型_年月日+随机字符串.$ext(也就是文件的格式)
    //strstr — 查找字符串的首次出现
    $fullname = strstr($file['type'],'/',true).'/'.date('YYYYmmdd');
    // 随机字符串
    for($i=0;$i<4;$i++){
        $fullname .= chr(mt_rand(65,90));
    }
    //拼凑后缀
    $fullname .= '.'.$ext;
 
 
 
 
    //移动到指定目录
    if(!is_uploaded_file($file['tmp_name'])){//is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的
        $error= '该文件不是通过post上传的!';
        return false;
    }
    //判断移动文件到新位置是否成功
    if(move_uploaded_file($file['tmp_name'],'D:/'.$path.'/'.$fullname)){// move_uploaded_file — 将上传的文件移动到新位置
        //如果成功
        return $fullname;
    }else{
        $error = '文件移动失败!';
        return false;
    }   
}

//提供数据
$file = $_FILES['image'];//文件名字
$path = 'uploads';//存放目录
$allow_type = array('image/jpg','image/jpeg','image/gif','image/pjpeg');//文件格式
$allow_format = array('jpg','gif','jpeg');
$max_size = 800000;
if($fullname = single_upload($file,$allow_type,$path,$allow_format,$error,$max_size)){
    echo $fullname;
}else{
    echo $error;
}