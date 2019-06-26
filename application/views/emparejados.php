<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Juego HTML</title>
  </head>
  <body>
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/juego_de_parejas.css"/>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
  //LOGICA PRINCIPAL DEL JUEGO
  /*En caso de añadir una imagen al juego solo es necesario añadir un td en HTML nuevo y la imagen en arrayImagenes*/
  var contadorPruebas=0;
  var anterior=null;
  var imagenElegida;
  var contadorFallos = 0;
  var contadorAciertos = 0;
  <?php $cont=0 ?>  
  var arrayImagenes = [
    <?php foreach ($emparejados as $data): ?>
      "<?php echo base_url(); ?>public/img_emparejados/<?php echo $data->img_pregunta; ?>", 
      "<?php echo base_url(); ?>public/img_emparejados/<?php echo $data->img_respuesta; ?>"
      <?php $cont =$cont+1;
        if ($cont!=10) {?>
          ,
        <?php } ?>
    <?php endforeach; ?>
  ]; 
  // Los valores de este arrglo corresponden a las imagenes que hacen pareja en el arreglo anterior, 
  // asignandoles el mismo valor a las casillas correspondientes a la pareja de imagenes, con un valor unico para cada pareja
  var arrayParejas = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10];
  var cantidadImagenes = arrayImagenes.length;
  var arrayPosiciones = new Array(cantidadImagenes);
  var arrayPosicionesParejas = new Array(cantidadImagenes);

  $(document).ready(function(){
    //Crea las posiciones de la array
    var contadorPosiciones = 0;
    //VARIABLES CRONOMETRO DE TIEMPO
    var inicioConteo;
    var idTimeout;
    var cronometro = document.querySelector('#time');
    //botonReiniciar = document.querySelector('#botonReiniciar');
    var cronometro_active = 0;
    var fin_juego = 0;
    while(contadorPosiciones < cantidadImagenes){
        var imagenPonemos = Math.floor((Math.random()*cantidadImagenes));
        var contadorPosicionesRepetidas =0;

        //Verifica que la imagen no se haya asignado anteriormente
        for (var x=0; x<contadorPosiciones; x++){
            if (arrayPosiciones[x]==imagenPonemos) contadorPosicionesRepetidas++;
        }

        //Asigna la imagen a la casilla y el valor al arreglo de posiciones de parejas para poder encontrar la solución mas adelante
        if (contadorPosicionesRepetidas != 1){
            arrayPosiciones[contadorPosiciones] = imagenPonemos;
            arrayPosicionesParejas[contadorPosiciones] = arrayParejas[imagenPonemos];
            contadorPosiciones++;
        }
    }
    //Recogemos cuando clique en un td
    $(".casilla").click(function(){    
      //Inicia el cronometro al dar click por primera vez en una casilla
      if(cronometro_active == 0){
          cronometro_active++;
          iniciar();
      }
      contadorPruebas++;
      //Recogemos la casilla
      var casilla = $(this).attr("id");
      if (contadorPruebas>1){
          imagenElegida = arrayPosiciones[casilla];

          //Hace la animación entre el fondo plano y la imagen de la segunda casilla seleccionada
          $("#"+casilla).animate({opacity: "toggle"}, 100);
          $("#"+casilla).animate({opacity: "toggle"}, 100);
          window.setTimeout(function(){
              $("#"+casilla).css("background-image", "url("+arrayImagenes[imagenElegida]+")").css("background-color", "transparent");
          },100);

          //console.log(arrayPosicionesParejas[anterior] + ":" + arrayPosicionesParejas[casilla]);

          //Comapara con el arreglo de posiciones de parejas si la imagen del deportista conside con el nombre de la jugada, 
          //si es asi la da por acertada y bloquea las acciones sobre las casillas correspondientes
          if (arrayPosicionesParejas[casilla]!=arrayPosicionesParejas[anterior]){
              contadorFallos++;
              $("#fallosN").html(contadorFallos);

              //No permite clicks en las casillas mientras corre la animación
              $(".casilla").css("pointer-events","none");

              //Cuando las casillas no coinciden corre la animacion de la imagen de regreso al color plano
              window.setTimeout(function(){
                  $("#"+casilla).animate({opacity: "toggle"}, 200);
                  $("#"+casilla).animate({opacity: "toggle"}, 200);
                  $("#"+anterior).animate({opacity: "toggle"}, 200);
                  $("#"+anterior).animate({opacity: "toggle"}, 200);
                  window.setTimeout(function(){
                      $("#"+casilla).css("background", "");
                      $("#"+anterior).css("background", "");

                      //Reactiva el click en las casillas cuando la animación termina
                      $(".casilla").css("pointer-events","auto");
                  },200);
              },500);
          }else{ 
              contadorAciertos++;
              $("#aciertos").html(contadorAciertos);

              //No permite que se vuelva a activar el click en las casillas que ya han sido acertadas y emparejadas
              $("#"+casilla).addClass("acertado");
              $("#"+anterior).addClass("acertado");
          }
          contadorPruebas = 0;
      }else{
          anterior = casilla;
          imagenElegida = arrayPosiciones[casilla];

          //Hace la animación entre el fondo plano y la imagen de la primera casilla seleccionada
          $("#"+casilla).animate({opacity: "toggle"}, 100);
          $("#"+casilla).animate({opacity: "toggle"}, 100);
          window.setTimeout(function(){
              $("#"+casilla).css("background-image", "url("+arrayImagenes[imagenElegida]+")").css("background-color", "transparent");
          },100);
          contadorPruebas++;

          //Al ser esta la primera de las dos casillas donde se intenta emparejar, no permite que se de click hasta que se seleccione otra casilla más
          $(this).css("pointer-events","none");
      }
      if(contadorAciertos == 10){
          console.log(cronometro_active);
          console.log("fin");
         stop();
          fin_juego++;
           var valor = 1;
          tiempo_juego = document.getElementById("time").textContent;
          var algo = tiempo_juego;
          console.log(algo);
          $(".tiempo_final").html(tiempo_juego);
          $("#panel_resultados").fadeIn();
          $("html, body").stop().animate({
              scrollTop: $("#juego_de_parejas").offset().top
          }, 500, 'swing'); 
          $.ajax({
            type:'POST',
            url:"<?php echo base_url();?>emparejados/insertar",
            dataType: 'json',
            data:{valor:valor},
          });

      }
    });


        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;
                //console.log(display.textContent);

                if (--timer == 0) {
                  
                  if(contadorAciertos < 10){
                    timer = 0,0,0 ;
                    var valor = 1;
                    $.ajax({
                      type:'POST',
                      url:"<?php //echo base_url();?>emparejados/insertar_perdida",
                      dataType: 'json',
                      data:{valor:valor},
                    });
                    $('#modalTiempo').modal('show');
                  }
                  document.getElementById('time').style.display = 'none';
                    
                    //$("#modalTiempo").modal('show');
                    
                }
            }, 1000);
        }

       

      //CRONOMETRO DE TIEMPO
    function zeroIzq(n){
        return n.toString().replace(/^(\d)$/,'0$1');
    }
    function formatoSegundos(s){
   //        return zeroIzq(Math.floor(s / 3600))+':'+zeroIzq(Math.floor(s%3600 / 60))+':'+zeroIzq(Math.floor((s%3600)%60));
        return zeroIzq(Math.floor(s%3600 / 60))+':'+zeroIzq(Math.floor((s%3600)%60));
    }
    
    function iniciar(){
      var fiveMinutes = 60 * 2,
      display = document.querySelector('#time');
      startTimer(fiveMinutes, display);
        // clearTimeout(idTimeout);
        // inicioConteo = Date.now();
        // actualizar();
    }

    function stop(){

     
      alert(startTimer);
      
    }

    $(document).ready(function()
   {
      $("#modalInicial").modal("show");
   });

    $(".cerrarModal").click(function(){
      $("#modalInicial").modal('hide');
    });

    $(".volver_jugar").click(function(){
       location.reload(true);
    });

    $(".ir_menu").click(function(){
      window.location.href = "<?php echo base_url('/') ?>";
    });

    //PANEL DE RESULTADOS
    $("#btn_reiniciar").click(function(){
        location.reload(true);
    });
    
    $("#btn_volver").click(function(){
        $("#infografia_jugada").hide();
        $("#resultados").show();
    });

    $("#juego_de_parejas .flecha").click(function(){
        $("#juego_de_parejas .preguntas").stop().animate({
            scrollTop: $("#juego_de_parejas .preguntas").scrollTop() + 100
        }, 500, 'swing');
    });
   
  });
  </script>




  <div id="juego_de_parejas">
    <div id="contenedor_juego"> 
      <div id="cabecera_juego" align="center"><img alt="Juego de Parejas" id="imagen_juego" src="<?php echo base_url(); ?>public/imagenes/titulo.png"/>
        <p>🅰🅿🆁🅴🅽🅳🅴   🅼🅰🆂   🆂🅾🅱🆁🅴   🅽🆄🅴🆂🆃🆁🅾   🅿🅰🅸🆂   🅹🆄🅶🅰🅽🅳🅾
        </p>
        <p id="time" class="titulo">02:00</p>
       
      </div>
      <div id="tablero_juego">
        <div class="casilla" id="0"></div>
        <div class="casilla" id="1"></div>
        <div class="casilla" id="2"></div>
        <div class="casilla" id="3"></div>
        <div class="casilla" id="4"></div>
        <div class="casilla" id="5"></div>
        <div class="casilla" id="6"></div>
        <div class="casilla" id="7"></div>
        <div class="casilla" id="8"></div>
        <div class="casilla" id="9"></div>
        <div class="casilla" id="10"></div>
        <div class="casilla" id="11"></div>
        <div class="casilla" id="12"></div>
        <div class="casilla" id="13"></div>
        <div class="casilla" id="14"></div>
        <div class="casilla" id="15"></div>
        <div class="casilla" id="16"></div>
        <div class="casilla" id="17"></div>
        <div class="casilla" id="18"></div>
        <div class="casilla" id="19"></div>
        
      </div>
    </div>
    
    <div id="panel_resultados">
      <div id="resultados">
        <label class="label_tiempo">Tiempo:</label><br/><span class="tiempo_final">-- seg</span>

        <hr/>
        <div class="preguntas">
          <table cellspacing="0">
            <tbody>
              <?php foreach ($emparejados as $data) {  ?>
    
              <tr>
                <td>
                  <img src="<?php echo base_url('public/img_emparejados/'.$data->img_pregunta); ?>" alt="" >
                  <img src="<?php echo base_url('public/img_emparejados/'.$data->img_respuesta); ?>" alt="" >
                  
                </td>
                <td>
                  <b><?php echo $data->pregunta; ?></b>
                  <p><?php echo $data->respuesta; ?></p>
                </td>
              </tr>
            <?php } ?>
             
            </tbody>
          </table>
        </div>
        <div><p class="flecha">&downarrow;</p></div>
        <hr/><br/><br/><span id="btn_reiniciar" class="volver_jugar">Reiniciar</span>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalInicial" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalInicialLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title contenidos" id="modalInicialLabel" style="color: #ff0000">SOPA DE LETRAS</h5>
    <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
     -->      </div>
          <div class="modal-body">
            <p class="contenidos">
                El juego conciste en encontrar las palabras dentro
                de la sopa de letras, tienes 2 minutos para poder
                superar esta prueba.
                Si consigues encontrar todas las palabras tendras
                10 puntos ganados.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-lg btn-block cerrarModal">JUGAR</button>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 2 -->

    <!-- Modal cierre de tiempo -->
    <div class="modal fade" id="modalTiempo" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalTiempoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title contenidos" id="modalTiempoLabel" style="color: #ff0000">EMPAREJADOS</h5>
    <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
     -->      </div>
          <div class="modal-body">
            <p class="contenidos">
                TU TIEMPO HA FINALIZADO!!!
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-lg btn-block volver_jugar" >JUGAR</button>
            <button type="button" class="btn btn-primary btn-lg btn-block ir_menu" >MENU</button>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal cierre de tiempo -->

    <!-- Modal ganaste -->
   
  </body>
</html>