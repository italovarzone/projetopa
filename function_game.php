<?php

function homeGame($title, $username, $user) {
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
            <p>Seja bem-vindo, $username</p>
            <button class=\"start\" id=\"startjogo\" onclick=\"startGame($user)\">
              Jogar
            </button>
            <a class=\"start\" href=\"orders/backend/processa_logout.php\">Logout</a>
          </div>
        </div>
    
        <div class=\"display2\">
          <div>$username</div>
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

function HomePage($title) {
  echo "<!DOCTYPE html>
  <html lang=\"pt-br\">
  <head>
      <meta charset=\"UTF-8\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <title>$title</title>
      <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ\" crossorigin=\"anonymous\">
      <link rel=\"stylesheet\" href=\"stylehomepage.css\">
  </head>
  <body>
      <div class=\"container\">
        <div class=\"card\">
          <h2>Recycle Memory</h2>
          <p>Aprenda a separar lixos se divertindo!</p>
          <div class=\"btn-group\" role=\"group\" aria-label=\"Opções de login e cadastro\">
              <button class=\"btn btn-primary\" onclick=\"location.href='orders/backend/login.php'\">Login</button>
              <button class=\"btn btn-success\" onclick=\"location.href='orders/backend/cadastro.php'\">Cadastro</button>   
          </div>
      </div>
  <!-- Bootstrap JS -->
  <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\"
      integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\"
      crossorigin=\"anonymous\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\"
      integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\"
      crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"
      integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\"
      crossorigin=\"anonymous\"></script>
  </body>
  </html>";
}

?>