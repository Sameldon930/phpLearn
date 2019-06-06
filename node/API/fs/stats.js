/**
 * 文件信息相关
 * 
 */
const fs = require('fs');

//参数1 文件  参数二 回调 
fs.stat('./stats.js',(err,stats)=>{
    if(err){
        console.log('文件不存在');
        return;
    };
    console.log(stats.isFile());//是否为文件  true
    console.log(stats.isDirectory());//是否是文件目录false
    
    console.log(stats);
    
})