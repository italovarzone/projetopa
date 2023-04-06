<?php
function homeGame($title) {
    echo "<!DOCTYPE html>
    <html lang=\"pt-br\">
      <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\" />
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin />
    
        <link
          href=\"https://fonts.googleapis.com/css2?family=Righteous&display=swap\"
          rel=\"stylesheet\"
        />
    
        <link rel=\"stylesheet\" href=\"assets/css/login.css\"/>
        <link rel=\"stylesheet\" href=\"assets/css/style.css\"/>
    
        <title>$title</title>
      </head>
    
      <body>
        <div id=\"gameStart\">
          <div class=\"mensagem\">
            <p>Jogo da Memória</p>

            <input
              type=\"text\"
              id=\"name\"
              placeholder=\"Nick\"
              class=\"login__input\"
              pattern=\"[a-zA-Z]+\"
            />
    
            <input
              type=\"number\"
              id=\"tel\"
              placeholder=\"(XX) XXXX-XXXX\"
              class=\"tel__input\"
            />
    
            <button class=\"start\" id=\"startjogo\" onclick=\"startGame()\">
              Jogar
            </button>
          </div>
        </div>
    
        <div class=\"display2\">
          <div id=\"nomePlayer\"></div>
          <div class=\"tempo\">
            <div style=\"display: inline-block; margin-right: 4px\">Time:</div>
            <div id=\"time\" style=\"display: inline-block\">00:00</div>
          </div>
        </div>
    
        <div id=\"gameBoard\">
          <!-- <div id=\"0000\" class=\"card\" data-icon=\"bootstrap\">
          <div class=\"card_front\">
            <img src=\"./assets/img/bootstrap.png\" class=\"icon\">
          </div>
          <div class=\"card_back\">
            <img src=\"./assets/img/card.png\">
          </div>
        </div> -->
        </div>
    
        <div class=\"display\">
          <p>Record:</p>
          <div id=\"recorde\">00:00</div>
        </div>
    
        <div id=\"gameOver\">
          <div class=\"mensagem\">
            <p id=\"resultado\"></p>
            <button id=\"restart\" onclick=\"restart()\">Start Game</button>
          </div>
        </div>
    
        <!-- Sons do jogo !-->
        <audio
          src=\"./assets/sound/card-start.mp3\"
          preload=\"auto\"
          id=\"card-start\"
        ></audio>
        <audio
          src=\"./assets/sound/card-click.mp3\"
          preload=\"auto\"
          id=\"card-click\"
        ></audio>
        <audio
          src=\"./assets/sound/card-check.mp3\"
          preload=\"auto\"
          id=\"card-check\"
        ></audio>
        <audio
          src=\"./assets/sound/card-win.mp3\"
          preload=\"auto\"
          id=\"card-win\"
        ></audio>
    
        <!-- JavaScript !-->
        <script src=\"./assets/js/game.js\"></script>
        <script src=\"./assets/js/script.js\"></script>
      </body>
    </html>
    ";
}



?>