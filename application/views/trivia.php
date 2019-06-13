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
              <div class="playTxt" onclick="learn()">Acerca de Nosotros</div>
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

    </div>
  </div>
<script type="text/javascript">
  function triv() {
  var home = document.querySelector(".home"),
    waitScreen = document.querySelector(".wait"),
    proTIP = document.querySelector(".protip"),
    normalUI = document.querySelector(".normalUI"),
    question = document.querySelector(".question"),
    choice1 = document.querySelector(".choiceA"),
    choice2 = document.querySelector(".choiceB"),
    choice3 = document.querySelector(".choiceC"),
    score = 0,
    gamescore = document.querySelector(".gameScore"),
    correctTxt = document.querySelector(".correct"),
    incorrectTxt = document.querySelector(".incorrect"),
    overScreen = document.querySelector(".gameOver"),
    affirm = document.querySelector(".affirmation"),
    yourPoints = document.querySelector(".pnts");

  setInterval(function() {
    gamescore.innerHTML = score;
  }, 50);

<?php $sabiass = $this->db->query("SELECT * FROM sabias ORDER BY RAND()")->row();?>
  var tips = [
             "<?php echo $sabiass->nombre; ?>"
  ];

  var questions = [
  <?php foreach ($triviaa as $trii) {
    echo "'".$trii->pregunta."',";
  }
  ?>
        
  ];
  var answers = [
    <?php foreach ($triviaa as $tri) {
      echo "["."'".$tri->respuesta_uno."',"." "."'".$tri->respuesta_dos."',"." "."'".$tri->respuesta_tres."'],";
    }
    ?>
  ];
  var answers2answers = [
  <?php 
      foreach ($triviaa as $triii) {
        echo $triii->respuesta_correcta.",";
      }
  ?>
  ];

  function PlayNormal() {
    setTimeout(function() {
      document.querySelector(".time").style.animation =
        "timeCheck 40s infinite linear";
    }, 4000);

    var r,
      correct,
      newTip = Math.floor(Math.random() * tips.length);
    proTIP.innerHTML = tips[newTip];
    home.style.width = "0";

    setTimeout(function() {
      normalUI.style.width = "350px";
    }, 200);
  

    setTimeout(function() {
      waitScreen.style.top = "-200%";
    }, 7000);

    var questionsAsked = [];

    function newR() {
      r = Math.floor(Math.random() * questions.length);

      question.innerHTML = questions[r];
      choice1.innerHTML = answers[r][0];
      choice2.innerHTML = answers[r][1];
      choice3.innerHTML = answers[r][2];
      correct = answers2answers[r];

      choice1.style.zIndex = "1";
      choice2.style.zIndex = "1";
      choice3.style.zIndex = "1";

      questions.splice(r, 1);
      answers.splice(r, 1);
      answers2answers.splice(r, 1);

      correctTxt.style.fontSize = "0";
      incorrectTxt.style.fontSize = "0";

      normalUI.style.background = "#143A83";
    }

    newR();

    choice1.addEventListener("click", function() {
      if (correct == 1) {
        score += 2;
        correctTxt.style.fontSize = "1200%";
        normalUI.style.background = "#009900";
      } else if (correct == 2 || correct == 3) {
        score -= 1;
        incorrectTxt.style.fontSize = "1200%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    choice2.addEventListener("click", function() {
      if (correct == 2) {
        score += 2;
        correctTxt.style.fontSize = "1200%";
        normalUI.style.background = "#009900";
      } else if (correct == 1 || correct == 3) {
        score -= 1;
        incorrectTxt.style.fontSize = "1200%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    choice3.addEventListener("click", function() {
      if (correct == 3) {
        score += 2;
        correctTxt.style.fontSize = "1200%";
        normalUI.style.background = "#009900";
      } else if (correct == 1 || correct == 2) {
        score -= 1;
        incorrectTxt.style.fontSize = "1200%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    setTimeout(function() {
      overScreen.style.left = 0;

      if (score >= 20) {
        overScreen.style.background = "#00ff7f";
        affirm.innerHTML = "¡Eres un Experto!";
      } else if (score >= 10) {
        overScreen.style.background = "#7647a2";
        affirm.innerHTML = "¡Bien Jugado!";
      } else if (score > 0 && score < 10 ) {
        overScreen.style.background = "#ff6666";
        affirm.innerHTML = "¡Vuelve a Intentarlo!";
      }      
      yourPoints.innerHTML = score;
    }, 44000);

    setTimeout(guarda_data, 55000);
  } 

  function guarda_data(){
      location = "/juegos/trivia/guarda/"+ <?php echo $persona_id;?>+"/"+score;
    }


  PlayNormal();
}

function newLearn() {
  var lever = document.querySelector(".leverHandle"),
    machine = document.querySelector(".trivMachine"),
    macMouth = document.querySelector(".mouth"),
    leftEye = document.querySelector(".l"),
    rightEye = document.querySelector(".r"),
      theFact = document.querySelector(".trivFact"),
      factTxt = document.querySelector(".factTxt"),
      blocker = document.querySelector(".blockOff");
  
  var fax = [
    "Triskaidekaphobia is the fear of the number 13",
    "Arm-fall-off-boy is a superhero in the DC universe who can take off his arm",
    "The world's longest word is 189,819 letters long and is the name of a giant protein",
    "112-year-old Masazō Nonaka of Japan, born 25 July 1905, is the world's oldest living man",
    "Coca-Cola's original color was green and was meant to be medicine",
    "A regular guitar has only six strings",
    "Aircraft black boxes are suprisingly colored orange",
    "New Zealand's 90 mile beach is only 55 miles long",
    "The Spanish Flu did not originate in a Spanish-speaking country. It was the USA",
    "Russia celebrates its October Revolution every November",
    "The 100 year war did not last 100 years. It lasted 116 years",
    "The purple finch is ironically colored red",
    "The longest chess game in a tournament took 269 moves and was 20 hours long",
    "'Fresh Guacamole' was the shortest movie that was nominated for an Oscar at only 100 seconds",
    "SOS does not mean anything. It's just a sign for help"
  ]
  
  var rFact = Math.floor(Math.random()*fax.length);

  lever.style.transform = "rotate(70deg)";

  setTimeout(function() {
    lever.style.transform = "rotate(-70deg)";
  }, 1000);
  
  leftEye.style.animation = "0.5s bop infinite alternate";
  rightEye.style.animation = "0.5s bop infinite alternate";
  macMouth.style.boxShadow =
    "-1vw 0vw #00ff7f, 1vw 0vw #00ff7f";
  rightEye.style.animationDelay = "0.5s";
  
  setTimeout(function(){
    leftEye.style.animation = "";
    rightEye.style.animation = "";
    macMouth.style.boxShadow = "-1vw 0vw #00ff7f, -2vw 0vw #00ff7f, 1vw 0vw #00ff7f, 2vw 0vw #00ff7f, 0vw 1vw #00ff7f, -1vw 1vw #00ff7f, 1vw 1vw #00ff7f";
    document.querySelector(".barrel").style.animation = "shoot 1s";
    machine.style.animation = "jump 0.8s";
    theFact.style.transform = "scale(1)";
    blocker.style.display = "block";
  }, 3000);
  
  theFact.addEventListener("click", function(){
    theFact.style.transform = "scale(0)";
    blocker.style.display = "block";
  });
  
  factTxt.innerHTML = fax[rFact];
}

function learn() {
  document.querySelector(".learnUI").style.display = "block";
  
  document.querySelector(".learnOut").addEventListener("click", function(){
    document.querySelector(".learnUI").style.display = "none";
  });
}
</script>



</body>
</html>
