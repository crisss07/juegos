<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>TRIV.io! </title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">



     

</head>

<body>
  
  <div style="width: 400px; display: block; " >
    <div class="container" style="width: 400px;">
        <div class="home">
            <h1 class="title col-md-12">
              <span class="T">T</span>
              <span class="T">R</span>
              <span class="R">I</span>
              <span class="R">V</span>
              <span class="I">I</span>
              <span class="I">A</span>
            </h1>
            <div class="play normal col-md-12" onclick="triv()">
              <div class="playTxt col-md-12">¡Empieza a Jugar!</div>
            </div>
            <div class="play col-md-12">
              <div class="playTxt" onclick="learn()">Reglas de Juego</div>
            </div>
            <div class="play1 normal col-md-4" onclick="triv1()">
              <div class="playTxt col-md-4">MENU PRINCIPAL</div>
            </div>
         </div>
       

      <div class="normalUI">
        <div class="gameOver">
          <h1 class="affirmation"></h1>
          <h2 class="pntsTxt">Obtuviste </br><span class="pnts"></span> PUNTOS!</h2>
        </div>
        <div class="wait">¿Est&aacute;s List@?
          <p class="protip"></p>
        </div>
        <div class="score">Score: <span class="gameScore">0000</span></div>
        <div class="questionWrap">
          <p class="question"></p>
        </div>
        <div class="play choiceA"></div>
        <div class="play choiceB"></div>
        <div class="play choiceC"></div>
        <div class="timeWrap">
          <div class="time"></div>
        </div>
        <div class="correct">✓</div>
        <div class="incorrect">✘</div>
      </div>
      <div class="learnUI">
        <h1 class="title">
          <span class="I">Las</span>
          <span class="T">Reglas</span>
          <span class="R">Del </span>
          <span class="A">Juego</span>
        </h1>
        <div class="prueba">El juego consiste en elegir la respuesta correcta lo mas antes posible, cada respuesta correcta acumulas 2 puntos, una incorrecta disminuye 1 punto. Solo tienes 3 intentos por día
        <!-- <div class="trivMachine">
          <div class="lever" onclick="newlearn()">
            <div class="leverHandle" onclick="newLearn()"></div>
          </div>
          
          <div class="meter"></div>
          <div class="meter right"></div>
          <div class="meter rightRight"></div>
          <div class="screen">
            <div class="face">
              <div class="eye l"></div>
              <div class="eye r"></div>
              <div class="mouth"></div>
            </div>
          </div>
          
          <div class="barrel">
            <div class="trivFact">
              <div class="factTxt"></div>
            </div>
          </div>
          <div class="blockOff"></div>
        </div> -->
        </div>
        <div class="learnOut">✕</div>
      </div>

    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  function triv() {
  Swal.fire('Alcanzaste el máximo de intentos por hoy. Intentalo mañana')
}

function learn() {
  document.querySelector(".learnUI").style.display = "block";
  
  document.querySelector(".learnOut").addEventListener("click", function(){
    document.querySelector(".learnUI").style.display = "none";
  });
}

function triv1() {
  location = "/juegos";
  
}


</script>



</body>
</html>
