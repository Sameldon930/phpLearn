/**
 * 
 * module.exports 和 exports 的区别   本身没有区别 但是如果写法是1那种 就不行 2 就可以
 */
// (
//     function(exports,require,module,__filename,__dirname){

//     }

// );

//方法1  这样写是不行的  
exports  ={
    a:1,
    v:2,
    test:3
};
//方法1必须这样改写才可以
module.exports = {
    a:1,
    v:2,
    test:3
};
