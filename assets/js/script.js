const FRONT = "card_front";
const BACK = "card_back";
const CARD = "card";
const ICON = "icon";

const cardClick = document.querySelector("#card-click");
const cardCheck = document.querySelector("#card-check");
const cardWin = document.querySelector("#card-win");
const cardStart = document.querySelector("#card-start");

const button = document.querySelector('.login__button');
const form = document.querySelector('.login-form');

let userScore = 0;
var iduser;

function startGame(userid) {
  iduser = userid;
  let gameStartLayer = document.getElementById("gameStart");
  gameStartLayer.style.display = "none";
  cardStart.play();
  stopTime();
  verificarLocalStorage();
  startTime();
  initializeCards(game.createCardsFromTechs());

  if (game.checkMatch()) {
    game.clearCards();
    cardCheck.play();
    
    if (game.checkGameOver()) {
      let gameOverLayer = document.getElementById("gameOver");
      gameOverLayer.style.display = "flex";
  
      cardWin.play();
      pauseTime();
      let resultadoP = document.getElementById("resultado");
      let tempoJogo = calculateTime(time);
      resultadoP.textContent = `Parabéns! Tempo de jogo: ${calculateTime(
        time
      )}`;
    }
  }
  
}

function initializeCards(cards) {
  let gameBoard = document.getElementById("gameBoard");
  gameBoard.innerHTML = "";

  game.cards.forEach((card) => {
    let cardElement = document.createElement("div");
    cardElement.id = card.id;
    cardElement.classList.add(CARD);
    cardElement.dataset.icon = card.icon;

    setTimeout(() => {
      cardElement.classList.add("flip");
    }, 300);
    setTimeout(() => {
      cardElement.classList.remove("flip");
    }, 3000);

    createCardContent(card, cardElement);
    cardElement.addEventListener("click", flipCard);
    gameBoard.appendChild(cardElement);
  });
}

function createCardContent(card, cardElement) {
  createCardFace(FRONT, card, cardElement);
  createCardFace(BACK, card, cardElement);
}

function createCardFace(face, card, element) {
  let cardElementFace = document.createElement("div");
  cardElementFace.classList.add(face);
  if (face === FRONT) {
    let iconElement = document.createElement("img");
    iconElement.classList.add(ICON);
    iconElement.src = "./assets/img/" + card.icon + ".png";
    cardElementFace.appendChild(iconElement);
  } else {
    let iconElement = document.createElement("img");
    iconElement.classList.add(ICON);
    iconElement.src = "./assets/img/card.png";
    cardElementFace.appendChild(iconElement);
  }
  element.appendChild(cardElementFace);
}

function flipCard() {
  if (game.setCard(this.id)) {
    this.classList.add("flip");
    cardClick.play();

    if (game.secondCard) {
      if (game.checkMatch()) {
        game.clearCards();
        cardCheck.play();

        if (game.checkGameOver()) {
          let gameOverLayer = document.getElementById("gameOver");
          gameOverLayer.style.display = "flex";

          cardWin.play();
          pauseTime();
          let resultadoP = document.getElementById("resultado");
          resultadoP.textContent = `Parabéns! Tempo de jogo: ${calculateTime(
            time
          )}`;
          
          compararTime(iduser, time);
        }
      } else {
        setTimeout(() => {
          let firstCardView = document.getElementById(game.firstCard.id);
          let secondCardView = document.getElementById(game.secondCard.id);

          firstCardView.classList.remove("flip");
          secondCardView.classList.remove("flip");
          game.unflipCards();
        }, 1000);
      }
    }
  }
}

function restart() {
  game.clearCards();
  compararTime(time);
  startGame();
  cardStart.play();
  let gameOverLayer = document.getElementById("gameOver");
  gameOverLayer.style.display = "none";
}

// ----------------------------------------------

let interval;
let time = 0;
let timeP = document.getElementById("time");

function startTime() {
  let startTime = Date.now() - time;
  interval = setInterval(() => {
    time = Date.now() - startTime;
    timeP.textContent = calculateTime(time);
  }, 1000);
}

function pauseTime() {
  clearInterval(interval);
  timeP.textContent = calculateTime(time);
}

function stopTime() {
  time = 0;
  clearInterval(interval);
  timeP.textContent = "00:00";
}

function calculateTime(time) {
  let totalSeconds = Math.floor(time / 1000);
  let totalMinutes = Math.floor(totalSeconds / 60);

  let displaySeconds = (totalSeconds % 60).toString().padStart(2, "0");
  let displayMinutes = totalMinutes.toString().padStart(2, "0");

  return `${displayMinutes}:${displaySeconds}`;
}

function verificarLocalStorage() {
  if (localStorage.length) {
    let timeStorage = localStorage.getItem("time");
    let recorde = document.getElementById("recorde");
    recorde.textContent = timeStorage;
  } else {
    // let zeroTime = localStorage.setItem("time", "00:00");
    let recorde = document.getElementById("recorde");
    recorde.textContent = "00:00";
    // console.log(zeroTime);
  }
}

function compararTime(iduser, time) {
  let recorde = document.getElementById("recorde");
  let timeStorage = localStorage.getItem("time");
  let timeA = calculateTime(time);

  let time1 = new Date("2022-01-01 " + timeStorage);
  let time2 = new Date("2022-01-01 " + timeA);

  console.log(time1);
  console.log(time2);

  if (time1 < time2) {
    localStorage.setItem("time", timeStorage);
    recorde.textContent = timeStorage;
  } else {-
    localStorage.setItem("time", timeA);
    recorde.textContent = timeA;
  }
  console.log(timeA);
  console.log(timeStorage);
  console.log(iduser);

  
  // fetch('http://localhost/projetopa/api/alteratempouser.php', {
  //   method: 'POST',
  //   headers: {
  //     'Content-Type': 'application/json'
  //   },
  //   body: JSON.stringify(
  //     {time_record: timeStorage, id_usuario: iduser})
  // })
  // .then(response => {
  //   console.log(response);
  //   if (!response.ok) {
  //     throw new Error('Erro ao atualizar o score do usuário');
  //   }
  // })
  // .catch(error => {
  //   console.error(error);
  // });

  var url = 'http://localhost/projetopa/api/alteratempouser.php';
  var formData = new FormData();
  formData.append('id', iduser);
  formData.append('time_record', timeStorage);


  fetch(url, { method: 'POST', body: formData })
  .then(function (response) {
    return response.text();
  })
  .then(function (body) {
    console.log(body);
  })
  .catch(error => {
    console.error(error);
  });

  // var dados = {
  //   'id': iduser,
  //   'time_record': timeStorage
  // }
  // dados = JSON.stringify(dados);
  
  // $.ajax({
  //   url: 'http://localhost/projetopa/api/alteratempouser.php',
  //   type: 'POST',
  //   data: {data: dados},
  //   success: function(result){
  //     // Retorno se tudo ocorreu normalmente
  //     console.log("Socesso");
  //   },
  //   error: function(jqXHR, textStatus, errorThrown) {
  //     // Retorno caso algum erro ocorra
  //     console.log("Ero");
  //   }
  // });
}