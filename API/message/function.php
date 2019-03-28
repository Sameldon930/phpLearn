<?php

//封装函数 实现短信发送

/**
 * 外部调用这个函数 直接传参数即可！ 形如下方
 * sendTemplateSMS("18250305186",array('2345','60'),"1");
 * 
 */

/**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('验证码','分钟数')，如不需替换请填 null
  * @param $tempId 模板Id   1 2 3
  */       
  function sendTemplateSMS($to,$datas,$tempId)
  {
        include_once("./CCPRestSDK.php");

        //主帐号
        $accountSid= '8aaf0708697b6beb0169c313bd4e31d5';
        
        //主帐号Token
        $accountToken= 'd088f8f21d7442b29d119fa2933fd4e0';
        
        //应用Id
        $appId='8aaf0708697b6beb0169c31db92731f3';
        
        //请求地址，格式如下，不需要写https://
        $serverIP='sandboxapp.cloopen.com';
        
        //请求端口 
        $serverPort='8883';
        
        //REST版本号
        $softVersion='2013-12-26';       
    
        // 初始化REST SDK
       
       $rest = new REST($serverIP,$serverPort,$softVersion);
       $rest->setAccount($accountSid,$accountToken);
       $rest->setAppId($appId);
      
       // 发送模板短信
    //    echo "Sending TemplateSMS to $to <br/>";
       $result = $rest->sendTemplateSMS($to,$datas,$tempId);
       if($result == NULL ) {
        //    echo "result error!";
        //    break;
            return false;
       }
       if($result->statusCode!=0) {
        //    echo "error code :" . $result->statusCode . "<br>";
        //    echo "error msg :" . $result->statusMsg . "<br>";
           //TODO 添加错误处理逻辑
           return false;

       }
       return true;
  }