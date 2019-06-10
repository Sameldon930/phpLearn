const pupp = require('puppeteer');
const{screenshot} = require('../src/config/default')
(async ()=>{
    const browser = await pupp.launch();
    const page = await browser.newPage();
    await page.goto('https://www.baidu.com');
    await page.screenshot({
        page:`${screenshot}/${Date.now()}.png`
    })
    await browser.close();
});