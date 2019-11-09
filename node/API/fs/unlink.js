/**
 * 删除文件
 * 
 */

 const fs  = require('fs');

 fs.unlink('./del',err=>{
     if(err)throw err;
     console.log('done');
     
 })