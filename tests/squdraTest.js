var assert = require('assert');
const { JSDOM } = require('jsdom');
const jquery = require('jquery');

// Create a fake DOM for simulating the browser
const { window } = new JSDOM(`
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

// Initialize jQuery with the window from JSDOM
const $ = jquery(window);
const { document } = window;

// Ora possiamo usare window, document, e tutto il resto come se fossimo nel browser
global.window = window;
global.document = window.document;
global.$ = $;

const handleClick = require('./../fanta-formula.js');

describe('Fanta Formula', function() {
  describe('#handleClick()', function() {
    it('should handle click events correctly', function() {
      // Define the counters object
      global.counters = { piloti: 1, scuderie: 0 };

      // Create the button and its parent
      var parentDiv = document.createElement('div');
      var button = document.createElement('button');
      button.classList.add('botton_costo_pilota'); // Add the class to the button
      button.value = 'Kevin Magnussen'; // Set the value of the button
      parentDiv.appendChild(button);
      document.body.appendChild(parentDiv);

      // Create the total element
      var totalElement = document.createElement('div');
      totalElement.id = 'total';
      totalElement.textContent = 'Budget disponibile: 200 $';
      document.body.appendChild(totalElement);

      // Create the choices element
      var choicesElement = document.createElement('div');
      choicesElement.id = 'choices';
      document.body.appendChild(choicesElement);

      // Create the popup and popupText elements
      global.popup = document.createElement('div');
      global.popupText = document.createElement('div');
      popup.appendChild(popupText);
      document.body.appendChild(popup);

      // Test the handleClick function
      var result = handleClick(button, 'piloti', 2);
      assert.equal(result, true);
      assert.equal(counters.piloti, 1);
    });
  });

  describe('#popupClose event listener', function() {
    it('should hide the popup when clicked', function() {
      // Create the popupClose element
      global.popupClose = document.createElement('button');
      popupClose.id = 'popup-close';
      document.body.appendChild(popupClose);

      // Add the event listener
      popupClose.addEventListener('click', function() {
        popup.style.display = 'none';
      });

      // Show the popup
      popup.style.display = 'block';
      // Simulate a click on the popup close button
      popupClose.click();
      // Verify that the popup was hidden
      assert.equal(popup.style.display, 'none');
    });
  });
  
  describe('#botton_costo_scuderia event listener', function() {
    it('should handle click events correctly', function() {
      // Define the scuderia variable
      global.scuderia = '';

      // Create a dummy button
      var button = document.createElement('button');
      button.setAttribute('data-price', '100');
      button.value = 'Ferrari';

      // Add the event listener
      button.addEventListener('click', function() {
        scuderia = this.value;
      });

      // Simulate a click on the button
      button.click();

      // Verify that the scuderia was set correctly
      assert.equal(scuderia, 'Ferrari');
    });
  });

  // Aggiungi altri test qui per le altre funzioni
});