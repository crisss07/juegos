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

  var tips = [
    "¿Sabías que? Caloncho, es el sitio de huellas de dinosaurios más importante del mundo ya que contiene más de cinco mil huellas de 294 especies de dinosaurios.",
    "¿Sabías que? El famoso camino de la muerte está en Bolivia, más conocido como el camino a los yungas, un camino de aproximadamente 80 kilómetros de extensión que une a la ciudad de La Paz y la región de los yungas al noreste.",
    "¿Sabías que? El pantanal en el departamento de Santa Cruz, el cual comparte con brasil, es el humedal más grande del mundo.",
    "¿Sabías que? El Salar de Uyuni, es el salar continuo más extenso del planeta con una dimensión de 10.582 kilómetros cuadrados, una superficie similar a la de países como el Líbano.",
    "¿Sabías que? En 1967 en Bolivia fue asesinado el ícono socialista más grande a nivel mundial Ernesto Che Guevara y su guerrilla fue derrotada muy cerca de valle grande en Santa Cruz. ",
    "¿Sabías que? En Bolivia se encuentran dos de los monumentos cristianos más grandes del mundo: El Cristo de la Concordia en Cochabamba y la Virgen del Socavón en Oruro."
  ];

  var questions = [
    "¿En que año paso por primera vez el Dakar por Bolivia?",
    "¿Cuál ha sido el único mundial de fútbol que ha disputado Bolivia?",
    "¿Cuál es la capital del departamento de Pando?",
    "¿Entre qué departamentos se encuentra el territorio indígena y parque nacional Isiboro Secure?",
    "¿En qué lugar y año tuvieron lugar los hechos conocidos como la Guerra del Agua?",
    "¿Cual es su primer Nombre del Viceministro?",
    "¿Cual es el ultimo Campeon del Mundo?",
    "¿Cual es su Capital de Bolivia?",
    "What was the length of the RMS Titanic?",
    "How many golf clubs are allowed in your bag during a tournament?",
    "Gold, AU, is what number on the Periodic Table?",
    "The german scientist who created the X-Ray name was ...",
    "Coca Cola's original color was ....",
    "The NBA logo silohouettes which basketball player?",
    "How many keys are on a standard piano?",
    "Allen Brooks voices which character in Disney's Nemo?",
    "What does the DC in DC comics stand for?",
    "Spell the word that concluded the 2017 Scripps National Spelling Bee",
  ];
  var answers = [
    ["2014", "2015", "2013"],
    ["Mexico", "Estados Unidos", "Francia"],
    ["Trinidad", "Rurrenbaque", "Cobija"],
    ["Cochabamba-Beni", "La Paz-Pando", "Beni-Pando"],
    ["El Alto 2006", "La Paz 2004", "Cochabamba 2000"],
    ["Javier", "Antonio", "Juan"],
    ["Argentina", "Francia", "Bolivia"],
    ["Sucre", "La Paz", "Cochabamba"],
    ["1098'", "984'", "883'"],
    ["14", "17", "19"],
    ["65", "79", "86"],
    ["Georg Kummer", "Denis Bönsch", "Wilhelm Röntgen"],
    ["Blue", "Green", "Brown"],
    ["Jerry West", "Lary Bird", "Michael Jordan"],
    ["88", "82", "76"],
    ["Nemo", "Phillip Sherman", "Marlin"],
    ["Daily Comics", "Detective Comics", "Dangerous Comics"],
    ["Marocain", "Marocane", "Mairocan"],
  ];
  var answers2answers = [
    1,
    2,
    3,
    1,
    3,
    1,
    2,
    1,
    3,
    1,
    2,
    3,
    2,
    1,
    1,
    3,
    2,
    1
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
      normalUI.style.width = "33%";
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
        score += 4;
        correctTxt.style.fontSize = "1800%";
        normalUI.style.background = "#009900";
      } else if (correct == 2 || correct == 3) {
        score -= 2;
        incorrectTxt.style.fontSize = "1800%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    choice2.addEventListener("click", function() {
      if (correct == 2) {
        score += 4;
        correctTxt.style.fontSize = "1800%";
        normalUI.style.background = "#009900";
      } else if (correct == 1 || correct == 3) {
        score -= 2;
        incorrectTxt.style.fontSize = "1800%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    choice3.addEventListener("click", function() {
      if (correct == 3) {
        score += 4;
        correctTxt.style.fontSize = "1800%";
        normalUI.style.background = "#009900";
      } else if (correct == 1 || correct == 2) {
        score -= 2;
        incorrectTxt.style.fontSize = "1800%";
        normalUI.style.background = "#cc0000";
      }
      choice1.style.zIndex = "-1";
      choice2.style.zIndex = "-1";
      choice3.style.zIndex = "-1";

      setTimeout(newR, 1000);
    });

    setTimeout(function() {
      overScreen.style.left = 0;

      if (score >= 30) {
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


    setTimeout(function() {
      normalUI.style.top = "-200%";
      overScreen.style.left = "-100%";
      location = location;
    }, 52000);

    //104000 total 1 minuto
    // $.ajax({
    //         url: '<?php echo base_url(); ?>Trivia/guarda',
    //         type: "POST",
    //         dataType: "json",
    //         data: {'puntaje': score},
    //       })
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