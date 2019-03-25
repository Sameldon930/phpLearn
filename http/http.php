<?php
 
 /**
  * 
  * http 协议特点
  * 1.c/s模式
  * 2.简单快速 通信速度快
  * 3.灵活 允许传输任意类型的数据对象（MIME类型）
  * 4.无连接 服务器处理完请求之后，收到客户端的应答之后，机会断开连接
  * 5.无状态 对于事务的处理有记忆能力，如果后续处理需要前面的信息，需要重传
  */

  /**
   * HTTP分类
   * 请求协议：浏览器向服务器发起请求的时候需要遵循的协议
   * 响应协议：服务器向浏览器发起响应的时候需要遵循的协议
   */

   /**
    * HTTP请求
    * 
    * 请求行:
    * 形式： 请求方式 资源路径 协议版本号
    * GET/index.php HTTP/1.1
    * 独占一行
    *
    * 请求头:各项协议的内容
    * Host:请求的主机地址
    * Accept:当前请求能够接收服务器返回的类型（MIME类型）
    * Accept-Language：接收的语言
    * User-Agent:客户浏览器所在点的一些信息
    * 不固定数量 每个请求协议独占一行 最后会有一行空行
    *
    *
    * 请求体:
    * 只有POST请求才会有请求体
    * 
    *
    *
    *
    *
    *
    */
