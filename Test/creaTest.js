const { JSDOM } = require('jsdom');
const jquery = require('jquery');
const nock = require('nock');

const dom = new JSDOM(`
<!doctype html>
<html>
  <body>
    <button id="myButton"></button>
    <div id="popup"></div>
    <div id="popup-text"></div>
    <button id="popup-close"></button>
    <div id="scelte"></div>
    <div id="total"></div>
    <div class="conferma-squad">
      <button class="button-squad" name="conferma_squadra">Conferma Squadra</button>
    </div>
    <button class="botton_costo_scuderia" data-price="100" value="RedBull">100$</button>
    <!-- Add any other elements that fanta-formula.js interacts with -->
  </body>
</html>
`);
global.document = dom.window.document;
global.window = dom.window;
global.$ = jquery(dom.window);

let expect;
const { handleClick, confermaSquadra } = require('../fanta-formula.js');


before(async () => {
    const chai = await import('chai');
    expect = chai.expect;
});

const sinon = require('sinon');

describe('handleClick', () => {
    let button, counterName, maxCount, parentDiv, totalElement, choicesElement;
    let counters = { piloti: 0, scuderia: 0 };

    beforeEach(() => {
        parentDiv = document.createElement('div');
        parentDiv.classList.remove('enabled', 'disabled');
        totalElement = document.createElement('div');
        totalElement.id = 'total';
        totalElement.textContent = "Budget disponibile: 15000 $";
        choicesElement = document.createElement('div');
        choicesElement.id = 'scelte';
        choicesElement.textContent = "Piloti: " + counters.piloti + "/2, Scuderie: " + counters.scuderia + "/1";
        counters.piloti = 0;
        counters.scuderia = 0;

        popup = document.getElementById('popup');
        popupText = document.createElement('div');
        popupText.id = 'popup-text';
        document.body.appendChild(popupText);
        sinon.stub(document, 'getElementById').callsFake((id) => {
            switch(id) {
                case 'total':
                    return totalElement;
                case 'scelte':
                    return choicesElement;
                case 'popup' :
                    return popup;
                case 'popup-text': 
                    return popupText;
                default:
                    return null;
            }
        });
    
        popup = document.createElement('div');
        document.body.appendChild(popup);
    });

    afterEach(() => {
        document.getElementById.restore();
    });

    it('Deve diminuire il totale e aumentare il counter quando parentDiv è enabled', () => {
        parentDiv.classList.add('enabled');
        button = document.createElement('button');
        button.setAttribute('data-price', '8100');
        button.value = 'Max Verstappen';
        counterName = 'piloti'; 

        counters[counterName] = 0;

        maxCount = 2;
        parentDiv.appendChild(button);

        totalElement.textContent = "Budget disponibile: 15000 $";
        choicesElement.textContent = "Piloti: 0/2, Scuderie: 0/1";

        //console.log("Prima " + totalElement.textContent);
        //console.log("Prima " + choicesElement.textContent);
        handleClick(button, counterName, maxCount, counters);
        //console.log("Dopo " + totalElement.textContent);
        //console.log("Dopo " + choicesElement.textContent);
        expect(totalElement.textContent).to.equal('Budget disponibile: 6900 $');
        expect(choicesElement.textContent).to.equal("Piloti: 1/2, Scuderia: 0/1");
    });

    it('Deve aumentare il totale e diminuire il counter quando parentDiv è disabled', () => {
        parentDiv.classList.add('disabled'); 
        button = document.createElement('button');
        button.setAttribute('data-price', '6900');
        button.value = 'RedBull';
        counterName = 'scuderia'; 

        counters[counterName] = 1;

        maxCount = 1;
        parentDiv.appendChild(button);

        totalElement.textContent = "Budget disponibile: 8100 $";
        choicesElement.textContent = "Piloti: 0/2, Scuderie: 1/1";

        //console.log("Prima " + totalElement.textContent);
        //console.log("Prima " + choicesElement.textContent);
        handleClick(button, counterName, maxCount, counters);
        //console.log("Dopo " + totalElement.textContent);
        //console.log("Dopo " + choicesElement.textContent);
        expect(totalElement.textContent).to.equal('Budget disponibile: 15000 $');
        expect(choicesElement.textContent).to.equal("Piloti: 0/2, Scuderia: 0/1");
    });

    it('Non possono essere selezionate due scuderie insieme e non dovrebbe cambiare il totale e il counter', () => {
        parentDiv.classList.add('enabled');
        button = document.createElement('button');
        button.setAttribute('data-price', '5700');
        button.value = 'Ferrari';
        counterName = 'scuderia'; 

        counters[counterName] = 1;

        maxCount = 1;
        parentDiv.appendChild(button);

        totalElement.textContent = "Budget disponibile: 8100 $";
        choicesElement.textContent = "Piloti: 0/2, Scuderia: 1/1";
        popupText.textContent = "";
        popup.style.display = 'none';

        //console.log("Prima " + popupText.textContent);
        //console.log("Prima " + choicesElement.textContent);
        handleClick(button, counterName, maxCount, counters);
        //console.log("Dopo " + popupText.textContent);
        //console.log("Dopo " + choicesElement.textContent);
        expect(totalElement.textContent).to.equal('Budget disponibile: 8100 $');
        expect(choicesElement.textContent).to.equal("Piloti: 0/2, Scuderia: 1/1");
        expect(popupText.textContent).to.equal("Non puoi scegliere più di 1 scuderia!");
        expect(popup.style.display).to.equal("block");
    });

    it('Non possono essere selezionati tre piloti insieme e non dovrebbe cambiare il totale e il counter', () => {
        parentDiv.classList.add('enabled');
        button = document.createElement('button');
        button.setAttribute('data-price', '5900');
        button.value = 'Charles Leclerc';
        counterName = 'piloti'; 

        counters[counterName] = 2;

        maxCount = 2;
        parentDiv.appendChild(button);

        totalElement.textContent = "Budget disponibile: 6000 $";
        choicesElement.textContent = "Piloti: 2/2, Scuderia: 0/1";
        popupText.textContent = "";
        popup.style.display = 'none';

        //console.log("Prima " + popupText.textContent);
        //console.log("Prima " + choicesElement.textContent);
        handleClick(button, counterName, maxCount, counters);
        //console.log("Dopo " + popupText.textContent);
        //console.log("Dopo " + choicesElement.textContent);
        expect(totalElement.textContent).to.equal('Budget disponibile: 6000 $');
        expect(choicesElement.textContent).to.equal("Piloti: 2/2, Scuderia: 0/1");
        expect(popupText.textContent).to.equal("Non puoi scegliere più di 2 piloti!");
        expect(popup.style.display).to.equal("block");
    });

    it('Non dovrebbe aumentare Piloti e non dovrebbe cambiare il Budget quando si supera il Budget massimo', () => {
        
        button = document.createElement('button');
        button.setAttribute('data-price', '6100');
        button.value = 'Sergio Perez';
        counterName = 'piloti'; 

        counters[counterName] = 1;

        maxCount = 2;
        parentDiv.appendChild(button);

        totalElement.textContent = "Budget disponibile: 0 $";
        choicesElement.textContent = "Piloti: 1/2, Scuderie: 1/1";
        popupText.textContent = ""; 
        popup.style.display = 'none';
        // console.log("Prima " + totalElement.textContent);
        // console.log("Prima " + choicesElement.textContent);
        // console.log("prima" + popupText.textContent);
        parentDiv.classList.add('enabled');
        handleClick(button, counterName, maxCount, counters, popupText);
        // console.log("Dopo " + totalElement.textContent);
        // console.log("Dopo " + choicesElement.textContent);
        // console.log("dopo" + popupText.textContent);
        expect(totalElement.textContent).to.equal('Budget disponibile: 0 $');
        expect(choicesElement.textContent).to.equal('Piloti: 1/2, Scuderie: 1/1');
        expect(popupText.textContent).to.equal('Non hai abbastanza budget per questo acquisto!');
        expect(popup.style.display).to.equal("block");

    });

    
});

describe('button-squad tests', () => {
    let scuderia, pilota1, pilota2, clock, timeLeft;
    let counters = { piloti: 0, scuderia: 0 };
    //let event = new dom.window.Event('click');
    //HTMLButtonElement.dispatchEvent(event);
    let getElementByIdStub, popup, popupText, popup1, popup1Text;

    beforeEach(() => {
        document.body.innerHTML = `
            <div id="popup"></div>
            <div id="popup-text"></div>
            <div id="popup1"></div>
            <div id="popup1-text"></div>
            <button class="button-squad"></button>
        `;

        scuderia = "";
        pilota1 = "";
        pilota2 = null;
        counters.scuderia = 0;
        counters.piloti = 0; 

        popup = document.getElementById('popup');
        popupText = document.createElement('div');
        popupText.id = 'popup-text';
        document.body.appendChild(popupText);

        popup1 = document.getElementById('popup1');
        popup1Text = document.createElement('div');
        popup1Text.id = 'popup1-text';
        document.body.appendChild(popup1Text);
        getElementByIdStub = sinon.stub(document, 'getElementById').callsFake((id) => {
            switch(id) {
                case 'total':
                    return totalElement;
                case 'scelte':
                    return choicesElement;
                case 'popup' :
                    return popup;
                case 'popup-text': 
                    return popupText;
                case 'popup1' :
                    return popup1;
                case 'popup1-text': 
                    return popup1Text;
                default:
                    return null;
            }
        });

        clock = sinon.useFakeTimers();

        require('../fanta-formula.js');
    });
    afterEach(() => {
        getElementByIdStub.restore();
        clock.restore();    
        sinon.restore();
    });

    it('Quando il formato della squadra non è rispettato (nomi), da un popup di errore', () => {
        scuderia = "Ferrari";
        pilota1 = "Max Verstappen";
        pilota2 = null;
        counters.scuderia = 1;
        counters.piloti = 2; 
        //console.log("Scuderia: "+ scuderia);
        confermaSquadra(scuderia, pilota1, pilota2, counters);
        //console.log("text: "+ popupText.textContent);
        //console.log("style: "+ popup.style.display);
        expect(popup.style.display).to.equal('block');
        expect(popupText.textContent).to.equal('Per favore, completa tutti i campi.');
    });
    it('Quando il formato della squadra non è rispettato (contatori), da un popup di errore', () => {
        scuderia = "Ferrari";
        pilota1 = "Max Verstappen";
        pilota2 = "Charles Leclerc";
        counters.scuderia = 1;
        counters.piloti = 1; 
        //console.log("Scuderia: "+ scuderia);
        confermaSquadra(scuderia, pilota1, pilota2, counters);
        //console.log("text: "+ popupText.textContent);
        //console.log("style: "+ popup.style.display);
        expect(popup.style.display).to.equal('block');
        expect(popupText.textContent).to.equal('Per favore, completa tutti i campi.');
    });
    it('Non deve lasciare che cambi squadra una volta che il torneo è iniziato', function() {
        // Imposta il tempo corrente a tre giorni dopo la data target
        const targetDate = new Date();
        targetDate.setFullYear(2025, 0, 1);
        clock.tick(targetDate.getTime() + (60 * 1000));

        timeLeft = -1;

        scuderia = "Ferrari";
        pilota1 = "Max Verstappen";
        pilota2 = "Charles Leclerc";

        // Chiamata alla funzione con la data target
        confermaSquadra(scuderia, pilota1, pilota2, {scuderia: 1, piloti: 2}, targetDate, timeLeft);

        expect(popup1.style.display).to.equal('block');
        expect(popup1Text.textContent).to.equal('Non puoi cambiare la squadra se la partita è iniziata.');
    });
    
});


describe('AJAX button-squad tests', () => {
    let scuderia, pilota1, pilota2, server, result;
    let counters = { piloti: 0, scuderia: 0 };
    let ajaxSpy;

    beforeEach(() => {
        scuderia = "";
        pilota1 = "";
        pilota2 = null;
        counters.scuderia = 0;
        counters.piloti = 0;
        
        result = true;

        server = sinon.createFakeServer();
        ajaxSpy = sinon.spy($, 'ajax');

        require('../fanta-formula.js');
    });

    afterEach(() => {
        server.restore();
        $.ajax.restore();
        sinon.restore();
    });

    it('Deve fare una richiesta AJAX quando si chiama confermaSquadra()', function() {
        server.respondWith("POST", "salva.php", [
            200,
            { "Content-Type": "application/json" },
            JSON.stringify({ success: "Squadra salvata con successo." })
        ]);
    
        scuderia = "Ferrari";
        pilota1 = "Max Verstappen";
        pilota2 = "Charles Leclerc";
    
        confermaSquadra(scuderia, pilota1, pilota2, {scuderia: 1, piloti: 2});
    
        server.respond();
    
        sinon.assert.calledOnce(ajaxSpy);
        sinon.assert.calledWithMatch(ajaxSpy, {
            type: 'POST',
            url: 'salva.php',
            data: { 
                scuderia: scuderia,
                pilota1: pilota1,
                pilota2: pilota2
            }
        });
    });

/*
    it('La richiesta AJAX deve dare successo quando il server risponde con successo', function() {
        server.respondWith("POST", "salva.php", [
            200,
            { "Content-Type": "application/json" },
            JSON.stringify({ success: "Squadra salvata con successo." })
        ]);
        
        scuderia = "Ferrari";
        pilota1 = "Max Verstappen";
        pilota2 = "Charles Leclerc";
        targetDate = 10;
        timeLeft = 10;
    
        confermaSquadra(scuderia, pilota1, pilota2, {scuderia: 1, piloti: 2}, targetDate, timeLeft);

        server.respond();
    
        sinon.assert.calledOnce(ajaxSpy);
        expect(result).to.equal(true);

    });
});

describe('AJAX tests with nock', function() {
    let dom, $, window, document;

    beforeEach(() => {
        dom = new JSDOM(`<!DOCTYPE html><html><body></body></html>`);
        window = dom.window;
        document = window.document;
        global.document = document;
        global.window = window;
        $ = jquery(window);
        global.$ = $;

        // Setup nock
        nock('http://localhost')
        .post('/salva.php')
        .reply(200, { "success": "Squadra salvata con successo." }, {
            'Content-Type': 'application/json'
        });
    });

    afterEach(() => {
        nock.cleanAll();
    });

    it('should handle AJAX success correctly', function(done) {
        global.XMLHttpRequest = window.XMLHttpRequest;

        // Assume 'confermaSquadra' is the function that makes the AJAX request
        // Ensure 'confermaSquadra' returns a promise
        confermaSquadra("Ferrari", "Max Verstappen", "Charles Leclerc", {scuderia: 1, piloti: 2})
        .then(response => {
            // Verifica che la risposta sia quella attesa
            expect(response).to.have.property('success', 'Squadra salvata con successo.');
            done();
        })
        .catch(error => {
            done(error);
        });
    });
});
*/
});

