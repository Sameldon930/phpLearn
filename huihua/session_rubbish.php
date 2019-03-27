<?php

// session 垃圾回收机制
// 提升空间利用率和session工作效率


/**
 * 垃圾回收参数
 * 
 * session.gc.maxlifetime = 1440;规定的session文件最大的生命周期是1440秒  24分钟
 * session.gc.probability = 1;垃圾回收概率分子
 * session.gc.divisor = 1000;垃圾回收概率分母
 * 
 * 回收的触发概率 = 垃圾回收概率分子/垃圾回收概率分母
 * 
 */

 
  