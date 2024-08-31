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
        
        //Diventa un User Logged
        await driver.findElement(By.id('username')).sendKeys('AdviceLOL'); 
        await driver.findElement(By.id('password')).sendKeys('Stocazzo5'); 
        await driver.findElement(By.css('.button-login')).click(); 
        
        //Accesso via GitHub, ma non salva le credenziali
        //await driver.findElement(By.partialLinkText('Signin With GitHub')).click();

        //Andiamo a fanta-formula
        await driver.wait(until.elementLocated(By.css('.menu-text')), 10000); 
        await driver.findElement(By.css('a.menu-text[href="fanta-formula.php"]')).click(); 

        //! Scenario 1: Interazione con il bottone che dovrebbe cambiare il totale
        await driver.findElement(By.css('button.botton_costo_scuderia[value="Ferrari"]')).click();

        //! Scenario 2: Verifica l'apertura di un popup e chiudilo
        let button = await driver.findElement(By.css('button.botton_costo_scuderia[value="RedBull"]'));
        await driver.executeScript("arguments[0].click();", button);

        await driver.wait(until.elementLocated(By.id('popup')), 10000); 

        await driver.sleep(1000);

        await driver.findElement(By.id('popup-close')).click();

        //! Scenario 3: Superare il budget
        await driver.findElement(By.css('button.botton_costo_scuderia[value="Ferrari"]')).click();
        await driver.findElement(By.css('button.botton_costo_pilota[value="Charles Leclerc"]')).click();
        let buttonVerstappen = await driver.findElement(By.css('button.botton_costo_pilota[value="Max Verstappen"]'));
        await driver.executeScript("arguments[0].click();", buttonVerstappen);
        let buttonRedBull = await driver.findElement(By.css('button.botton_costo_scuderia[value="RedBull"]'));
        await driver.executeScript("arguments[0].click();", buttonRedBull);

        await driver.wait(until.elementLocated(By.id('popup')), 10000); 
        await driver.sleep(1000);
        await driver.findElement(By.id('popup-close')).click();

        //! Scenario 4: tre Piloti scelti
        buttonVerstappen = await driver.findElement(By.css('button.botton_costo_pilota[value="Max Verstappen"]'));
        await driver.executeScript("arguments[0].click();", buttonVerstappen);
        let buttonNorris = await driver.findElement(By.css('button.botton_costo_pilota[value="Lando Norris"]'));
        await driver.executeScript("arguments[0].click();", buttonNorris);
        let buttonGasly = await driver.findElement(By.css('button.botton_costo_pilota[value="Pierre Gasly"]'));
        await driver.executeScript("arguments[0].click();", buttonGasly);
        
        await driver.wait(until.elementLocated(By.id('popup')), 10000); 
        await driver.sleep(1000);
        await driver.findElement(By.id('popup-close')).click();
        

        //! Scenario 5: Creare la squadra
        buttonNorris = await driver.findElement(By.css('button.botton_costo_pilota[value="Lando Norris"]'));
        await driver.executeScript("arguments[0].click();", buttonNorris);
        let buttonFerrari = await driver.findElement(By.css('button.botton_costo_scuderia[value="Ferrari"]'));
        await driver.executeScript("arguments[0].click();", buttonFerrari);
        buttonGasly = await driver.findElement(By.css('button.botton_costo_pilota[value="Pierre Gasly"]'));
        await driver.executeScript("arguments[0].click();", buttonGasly);

        let buttonConfermaSquadra = await driver.findElement(By.css('button.button-squad[name="conferma_squadra"]'));
        await driver.executeScript("arguments[0].click();", buttonConfermaSquadra);

    } finally {
        await driver.sleep(10000);
        await driver.quit();
    }
})();
