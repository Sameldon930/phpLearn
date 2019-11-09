/**
 * 
 * 
 * process
 * 
 */

//argv
const {argv,argv0,execArgv,execPath} = process;

argv.forEach(item => {
    console.log(item);
    //显示两条 一条是node安装的路径   第二条是当前执行的文件保存路径 --test 
//D:\nodejs\node.exe
//D:\laragon\www\phpLearn\node\oneday\process.js
    
});
console.log(argv0);//node

console.log(execArgv);//[]

console.log(execPath);//D:\nodejs\node.exe

/**
 * 环境信息
 */
const {env} = process;
console.log(env);

//cwd
console.log(process.cwd());


// 三个执行先后顺序 nextTick->setTimeout->setImmediate
setImmediate(()=>{
    console.log('setImmediate');//这个后执行
})
setTimeout(() => {
    console.log('setTimeout');
    
}, 0);
process.nextTick(()=>{
    console.log('nextTick2');//这个先执行
    process.nextTick(()=>{
    console.log('nextTick1');//这个先执行
        
    })
})


