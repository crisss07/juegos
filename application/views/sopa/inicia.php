<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sopa de letras</title>
    <!-- <link rel="stylesheet" type="text/css" href="sopa.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/sopa.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <style type="text/css">
        .titulo{
            font-family: 'Luckiest Guy', cursive;
            /*font-size: 50px;*/
            /*color: #ff0000;*/
            color: #FFF;
              /*font-family: "Kanit";*/
              font-size: 45px;
              line-height: 1em;
              margin: 0;
              /*position: absolute;*/
              text-align: center;
              top: 50%;
              /*transform: translateY(-50%);*/
              /*width: 100%;*/
              text-shadow: 0 1px 0 #e4adad, 0 2px 0 #e1a6a6, 0 3px 0 #df9e9e, 0 4px 0 #dc9696, 0 5px 0 #da8f8f, 0 6px 0 #d78787, 0 7px 0 #d58080, 0 8px 0 #d27878, 0 0 5px rgba(237, 154, 154, 0.05), 0 -1px 3px rgba(237, 154, 154, 0.2), 0 9px 9px rgba(237, 154, 154, 0.5), 0 12px 12px rgba(237, 154, 154, 0.5), 0 15px 15px rgba(237, 154, 154, 0.5);
        }
        .contenidos{
            font-family: 'Handlee', cursive;
            font-size: 28px;
            /*color: #ff0000;*/
            font-weight: bolder;            
        }
        #txt_tutorial {
          position: absolute;
          left: 0px;
          top: 0px;
          z-index: +1;
          /*background: #ff0000;*/
        }
    </style>
</head>

<body>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
 -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title contenidos" id="exampleModalLabel" style="color: #ff0000">SOPA DE LETRAS</h5>
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 -->      </div>
      <div class="modal-body">
        <p class="contenidos">
            El juego conciste en encontrar las palabras dentro
            de la sopa de letras, tienes 3 minutos para poder 
            superar esta prueba.
            Si consigues encontrar todas las palabras tendras 
            10 puntos ganados.
        </p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button>
      </div>
    </div>
  </div>
</div>

    
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <form class="col-12">
    
        <p>&nbsp;</p>
        <p class="titulo">SOPA DE LETRAS</p>
        <p id="time" class="titulo">03:00</p>
        <div id="txt_tutorial">
            <p>&nbsp;</p>
            
<!--             <center>
                <div id="BOTjugar" onclick="inicia();" class="contenidos">JUGAR</div>
            </center>
 -->        </div>
        <div width="100%" id="sopa_contenidos">
            <p class="contenidos" style="color: #ff0000;"><?php echo $pregunta; ?></p>
            <p class="contenidos">
            <?php
                $palabras = "";
                foreach ($respuestas as $key => $r) {
                    $palabras .= $r['respuesta'] . ",";
                }
                $palabras_pulidas = rtrim($palabras, ",");
                // echo $palabras_pulidas;
            ?>
            </p>
            <!-- <div>El juego conciste en encontrar las siguientes palabras <span id="time">01:00</span> minutes!</div> -->
            <div id="theGrid" width="100%" style="display: block;"></div>
            <!-- <input type="button" onclick="inicia();" value="iniciar"> -->
        </div>      
          
        </form>   
      </div>
    </div>
    
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                    console.log('termino');
                }
            }, 1000);
        }

        function inicia() {
            // $("#sopa_contenidos").toggle('slow');
            // $("#txt_tutorial").toggle('slow');
            // $("#time").toggle('slow');
            var fiveMinutes = 60 * 3,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        }

        // window.onload = function () {
        //     var fiveMinutes = 60 * 5,
        //         display = document.querySelector('#time');
        //     startTimer(fiveMinutes, display);
        // };
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/sopa.js'); ?>"></script>
    <script>
        (function(b) {
            b.support.touch = "ontouchend" in document;
            if (!b.support.touch) {
                return;
            }
            var c = b.ui.mouse.prototype,
                e = c._mouseInit,
                a;

            function d(g, h) {
                if (g.originalEvent.touches.length > 1) {
                    return;
                }
                g.preventDefault();
                var i = g.originalEvent.changedTouches[0],
                    f = document.createEvent("MouseEvents");
                f.initMouseEvent(h, true, true, window, 1, i.screenX, i.screenY, i.clientX, i.clientY, false, false, false, false, 0, null);
                g.target.dispatchEvent(f);
            }
            c._touchStart = function(g) {
                var f = this;
                if (a || !f._mouseCapture(g.originalEvent.changedTouches[0])) {
                    return;
                }
                a = true;
                f._touchMoved = false;
                d(g, "mouseover");
                d(g, "mousemove");
                d(g, "mousedown");
            };
            c._touchMove = function(f) {
                if (!a) {
                    return;
                }
                this._touchMoved = true;
                d(f, "mousemove");
            };
            c._touchEnd = function(f) {
                if (!a) {
                    return;
                }
                d(f, "mouseup");
                d(f, "mouseout");
                if (!this._touchMoved) {
                    d(f, "click");
                }
                a = false;
            };
            c._mouseInit = function() {
                var f = this;
                f.element.bind("touchstart", b.proxy(f, "_touchStart")).bind("touchmove", b.proxy(f, "_touchMove")).bind("touchend", b.proxy(f, "_touchEnd"));
                e.call(f);
            };
        })(jQuery);

        $(document).ready(function() {
            var words = "<?php echo $palabras_pulidas; ?>";
            $("#exampleModal").modal('show');
            //attach the game to a div
            $("#theGrid").wordsearchwidget({
                "wordlist": words,
                "gridsize": 12,
                // "width" : 300
            });

            $("#exampleModal").on("hidden.bs.modal", function () {
               inicia(); 
            });
        });
    </script>
</body>

</html>