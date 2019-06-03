const{sep,delimiter,win32,posix} = require('path');

console.log('sep:',sep);//  sep: \

// console.log('PATH',process.env.PATH);

console.log('delimiter',delimiter);//delimiter ;




const path = require('path');
const mod = require('../oneday/cusmod');
console.log(mod.testVar);
console.log('__dirname',__dirname);//__dirname  D:\laragon\www\phpLearn\node\API
console.log('process.cwd()',process.cwd()); //process.cwd()  D:\laragon\www\phpLearn\node\API
console.log('./',path.resolve('./'));//    ./   D:\laragon\www\phpLearn\node\API


