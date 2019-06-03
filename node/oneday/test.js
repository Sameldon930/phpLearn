// console.log('one day');


/**
 * 
 * 引入自己自定义模块
 */
//引入cusmod.js
const mod = require('./cusmod');

// console.log(mod.testFn);//[Function: test]
// console.log(mod.testVar);//100


//执行两句 等同于一句
require('./cusmod');
require('./cusmod');

//调用模块A和B
//引入modA.js和modB.js
const modA =  require('./modA');//A
const modB =  require('./modB');//B

console.log(modA.test);//AA

console.log(modB.test);//BB

//引入exps
const ex = require('./exps');
console.log(ex.test);//3
console.log(ex.test);//3

// 引入global
const glo = require('./global');
console.log(glo.test);//局部变量  1000
console.log(gloVar);//200

