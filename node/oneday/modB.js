module.exports.test = 'B';

//引入模块A
const modA = require('./modA');

console.log(modA.test);

module.exports.test = 'BB';
