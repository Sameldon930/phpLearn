/**
 * 
 * 
 * basename
 */

 const{basename,dirname,extname} = require('path');
 
 const filePath = '/usr/local/bin/no.txt';
 console.log(basename(filePath));//no.txt
 console.log(dirname(filePath));//除了文件外的路径 /usr/local/bin
 console.log(extname(filePath));//文件后缀  .txt

 