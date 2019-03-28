<?php

public function sendCode(){
    //获取具体要发送的的手机号
    $tel = $_POST['tel'];
    if(!$tel){
        echo '手机号码错误';
    }
    //根据手机号发送短信验证码
    $code = rand(1000,9999);//生成随机的四位的验证码
    //调用发送短信的方法
    $res = sendTemplateSMS($tel,arrya($code,'60'),'1');
    if(!$res){
        echo '发送验证码失败!';
    }
    //记录验证码存到session
    //需要保证验证码有过期时间 
    //可以记录当前发送验证码的时间以及具体的有效时间
    $data = array(
        'code'=>$code,
        'time'=>time(),
        'limit'=>3600
    );
    session('telcode',$data);
    echo'OK';

}
