<?php

/**
 * 
 * 会话控制
 * 
 * 
 */
//cookie
//创建 key value time
setcookie("zzs","sss");
//读取
$_COOKIE['zzs'];
//创建数组
setcookie('a[z]','aaaa');
//删除cookie
setcookie('zzs','',time()-1000);



//session

//开启
session_start();

//创建
$_SESSION['zzs'] = 'sss';

//删除
$_SESSION = [];
//或
session_destroy();


//传递seesionId
$T = '<a href="index.php?<?php echo SID ?>"></a>';