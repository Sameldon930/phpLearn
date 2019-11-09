const puppeteer = require('puppeteer');

(async ()=>{
    const browser = await puppeteer.launch()
    const page = await browser.newPage()
    await page.goto('https://image.baidu.com/')
    console.log('go to baidu ');
    
    await page.setViewport({
        width:1920,
        height:1080
    });

    console.log('reset');
    
    await page.focus('#kw');

    await page.keyboard.sendCharacter('狗')

    await page.click('.s_btn')
    
    console.log('go to search list');
    
    page.on('load',()=>{
        console.log('page loading done,start fetch');
        const srcs = await page.evaluate(()=>{
            const images =  document.querySelectorAll('img.main_img');
            return Array.prototype.map.call(images,img=>img.src)
        })        
        
        srcs.forEach(src=>{
            
        })
    })
})();