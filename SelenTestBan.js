const { Builder, By } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');
const { until } = require('selenium-webdriver');
const path = require('path');

(async function example() {
    let driver = await new Builder()
        .forBrowser('chrome')
        .setChromeOptions(new chrome.Options()) 
        .build();

    try {
        await driver.get('http://localhost/login/loginStart.php'); 

        await driver.findElement(By.id('username')).sendKeys('Tommaso'); 
        await driver.findElement(By.id('password')).sendKeys('Tommaso.2002'); 
        await driver.findElement(By.css('.button-login')).click(); 

        await driver.wait(until.elementLocated(By.id('userImage')), 10000);
        await driver.findElement(By.id('userImage')).click();

        await driver.sleep(2000);
        await driver.wait(until.elementLocated(By.id('Ban_button')), 20000);
        await driver.findElement(By.id('Ban_button')).click();

        await driver.wait(until.elementLocated(By.id('control_ban_button_Francesco')), 20000);
        await driver.findElement(By.id('control_ban_button_Francesco')).click();

        await driver.findElement(By.css('a[href="index.php"] img[src="media/logo.png"]')).click();

        await driver.findElement(By.css('.r-l .button')).click();

        await driver.sleep(2000);

        await driver.wait(until.elementLocated(By.css('.r-l #loginButton.button')), 20000);
        await driver.findElement(By.css('.r-l #loginButton.button')).click();

        

        await driver.findElement(By.id('username')).sendKeys('Francesco');
        await driver.findElement(By.id('password')).sendKeys('Gesco122002'); 
        await driver.findElement(By.css('.button-login')).click(); 

    } finally {

        await driver.sleep(8000);
        await driver.quit();
    }
})();