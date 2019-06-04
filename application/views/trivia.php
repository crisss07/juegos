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
    <span class="I">¿</span>
    <span class="T">Sab&iacute;as</span>
    <span class="R">que</span>
    <span class="I">?</span>
  </h1>
  <div class="trivMachine">
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
  </div>
  <div class="learnOut">✕</div>
</div>
    <script  src="<?php echo base_url(); ?>public/js/index.js"></script>
</body>
</html>
