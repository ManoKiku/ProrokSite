var audio = document.getElementById("myAudio"); 
var logo = document.getElementById("appName")
var count = 0;

function rainbowText(element, speed = 0.005) {
      let hue = 0;

      function updateColor() {
          hue += speed * 360;
          hue %= 360;
          element.style.color = `hsl(${hue}, 100%, 50%)`;
          requestAnimationFrame(updateColor);
      }
      updateColor();
  }

function playAudio() { 
  count++;

  if(count == 10) {
      console.log("HELL YEAH");
      
      var buff = new Audio('resources/rainbow.mp3');
      buff.play();
      rainbowText(logo);
  }
  else {
      audio.play(); 
  }
} 

function hideModal(modal) {
  modal.classList.add('hidden');
  
  modal.addEventListener('transitionend', function handler() {
      modal.style.display = 'none';
      modal.removeEventListener('transitionend', handler);
  });
}

function showModal(modal) {
  modal.style.display = 'block';
  requestAnimationFrame(() => {
      modal.classList.remove('hidden');
  });
}

logo.onclick = playAudio;

var showCandleButton = document.getElementById('show-candle');
var closeCandleButton = document.getElementById('close-candle');
var candleModal = document.getElementById('modal-candle');
var sendCandleButton = document.getElementById('send-candle');

showCandleButton.onclick = () => showModal(candleModal);

closeCandleButton.onclick = () => hideModal(candleModal);

sendCandleButton.onclick = function() {
  var captionInput = document.getElementById('caption-input');
  var nameInput = document.getElementById('name-input');
  var errorText = document.getElementById('error-text');

  if(captionInput.value.length === 0 || nameInput.value.length === 0) {
      errorText.textContent = 'Все поля должны быть заполнены!';
      return;
  }
  
  sendCandleButton.disabled = true;
  fetch("api/send-candle.php", {
      method: "POST",
      body: JSON.stringify({
          caption: captionInput.value,
          name: nameInput.value
      }),
      headers: {
          "Content-type": "application/json; charset=UTF-8"
      }
  })
  .then((response) => response.json())
  .then(json => {
     sendCandleButton.disabled = false;
     if(json.status === 'success') {
          hideModal(candleModal);

          gridElement = document.getElementById('candles-grid');
          candleDiv = document.createElement("div");
          imageDiv = document.createElement("div");
          nameP = document.createElement('p');

          candleDiv.classList = ['candle-item'];
          imageDiv.classList = ['candle-image'];

          imageDiv.appendChild(document.createTextNode(captionInput.value));
          nameP.appendChild(document.createTextNode(nameInput.value));

          candleDiv.appendChild(imageDiv);
          candleDiv.appendChild(nameP);

          gridElement.prepend(candleDiv);

          captionInput.value = '';
          nameInput.value = '';
     }
     else {
          errorText.textContent = json.message;
     }
  })
  .catch(error => {
      sendCandleButton.disabled = false;
      errorText.textContent = 'Ошибка во время добавления свечки!';
  });
};