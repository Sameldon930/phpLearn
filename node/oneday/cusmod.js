/**
 * 模块初始化
 * 
 */

console.log('this is module');

const testVar = 100;

function test(){
    console.log(testVar);
}

// 模块对外的接口 让外部调用
module.exports.testVar = testVar;//变量
module.exports.testFn = test;//方法