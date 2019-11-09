/**
 * 删除文件夹
 * 
 */
const fs = require('fs');

fs.rmdir('./clp',(err)=>{
    if(err)throw false;
    console.log('done');
    
})