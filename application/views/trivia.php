<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>TRIV.io! </title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">

</head>

<body>

  <div class="home">
  <h1 class="title">
    <span class="T">T</span>
    <span class="T">R</span>
    <span class="R">I</span>
    <span class="R">V</span>
    <span class="I">I</span>
    <span class="I">A</span>
  </h1>
  <div class="play normal" onclick="triv()">
    <div class="playTxt">¡Empieza a Jugar!</div>
  </div>
  <div class="play learn">
    <div class="playTxt" onclick="learn()">Acerca de Nosotros</div>
  </div>
    </div>
  </div>
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
    <span class="I">El</span>
    <span class="T">Objetivo</span>
    <span class="R">Estratégico </span>
    <span class="A">Vivienda</span>
  </h1>
  <div class="prueba">Es Contribuir a la reducción progresiva del déficit habitacional a través de políticas, normas, programas y proyectos integrales basados en la participación, autogestión, concurrencia, ayuda mutua, responsabilidad compartida y solidaridad social.
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
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script  src="<?php echo base_url(); ?>public/js/index.js"></script>
</body>
</html>
