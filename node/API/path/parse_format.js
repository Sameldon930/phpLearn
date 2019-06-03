const {parse,format} = require('path'); 
//定义路径
const filePth = '/usr/local/node_modules/n/package.json';

console.log(parse(filePth));
// { root: '/',dir: '/usr/local/node_modules/n',base: 'package.json',ext: '.json',name: 'package' }

console.log(format(parse(filePth)));///usr/local/node_modules/n\package.json
