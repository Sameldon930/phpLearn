<?php


/**
 * 原理
 * 
 * 第一次请求 通过setcookie的函数通过http协议响应头传输给浏览器
 * 
 * 浏览器响应的时候 将cookie存到浏览器
 * 
 * 后续进行访问,会自动检测是否存在cookie 如果存在 在请求头中将数据携带到服务器
 * 
 * php执行的时候 会检测浏览器是否有cookie 如果写到自动保存到$_cookie中
 * 
 * 利用 
 * $_COOKIE 来访问cookie数据
 * cookie的数据必须是数值或者字符串 没有其他类型
 * 能够实行跨脚本共享数据
 * 
 * 
 */
/**
 * 
 * cookie作用范围:
 * 
 * 上层cookie只能访问这一层的 不能访问下一层的 
 * 下层cooki可以范围跟上层的
 * 
 */


 //cookie的设置
//  setcookie('age',1);
//  setcookie('name','zzs');

//读取cookie
// var_dump($_COOKIE);

/**
 * 
 * 
 * cookie生命周期
 * 
 * 不设定周期 默认是关闭浏览器后 cookie被清除
 * 设置限定生命周期 使用时间戳来设置
 * 
 * 
 */

 //创建有生命周期的cookie
 setcookie('a1','a1');//普通时间戳
 setcookie('a2','a2',time()+60*60*24*7);//生命周期为7天后结束
 setcookie('a3','a3',0);//0生命周期 等同于普通 也就是关闭浏览器后失效

 //清空cookie内容
//  setcookie('a2','');//不给值
//  setcookie('a2','a2',time());//直接将时间设置为当前时间戳 也能起到同样的作用

//设定全局访问cookie
setcookie('globale','global',0,'/');//  斜杠的作用范围是网站的根目录

//cookie尝试保存数组
setcookie('go[0]','1');
setcookie('go[1]','2');
setcookie('go[2]','3');
setcookie('go[3]','4');

echo '<pre>';

//获取数组中的值
// print_r($_COOKIE['go'][1]);
