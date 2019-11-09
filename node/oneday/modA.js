module.exports.test = 'A';

//引入模块B
const modB = require('./modB');
console.log(modB.test);//模块A中打印模块B中的test


module.exports.test = 'AA';
