/**
 * 
 * 
 * 文件夹的操作
 * 
 */
const fs = require('fs');

// 读取当前目录下的所有文件
fs.readdir('./',(err,files)=>{
    if(err)throw err;
    console.log(files);
    

});