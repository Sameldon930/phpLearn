<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/29 0029
 * Time: 14:00
 */

 $res = http_curl('http://v.juhe.cn/exp/index',array(
    'com' =>'ems',
    'no' => '9895098690856',
    'key' =>'01e309d8772c928ca991fcdb57fc1ce8'

),'GET');

 var_dump($res);
/**
 *
 * 封装发送请求的参数   get/post
 * $url  具体请求的地址
 * $data  请求的参数的信息
 * $method  请求的方法  默认为get方法
 */
function http_curl($url,$data=array(),$method){
    //先判断curl_init()函数是否存在
    if(!function_exists('curl_init')){
        //如果不存在的话 那就表示  curl未开启
        echo 'curl扩展未开启！';
        exit();
    }
    //组装函数来实现请求的方法

    //1.打开会话
    $ch = curl_init();
    //设置参数
    //设置请求方式 默认是get
    if($method == 'POST'){//如果请求方式是post的话
        //开启post请求
        curl_setopt($ch,CURLOPT_POST,TRUE);
        //设置post请求的参数
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

    }else{//对于get方式
        //直接将参数拼接到请求连接即可
        $url.='&'.http_build_query($data);
    }
    //设置具体的请求地址
    curl_setopt($ch,CURLOPT_URL,$url);
    //设置得到的结果不进行输出
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);




    //执行请求
    $res = curl_exec($ch);
    //关闭会话
    curl_close($ch);
    //将请求得到的结果转换成数组格式
    return json_decode($res,true);//转成数组
}