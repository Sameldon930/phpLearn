/**
 * 
 * 监视变化
 * 
 */
const fs = require('fs');
fs.watch('./',{
    recursive:true,//递归所有内容

},(eventType,filename)=>{//变化类型 文件名
    console.log(eventType,filename);
    
})