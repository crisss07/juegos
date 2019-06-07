<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Juego HTML</title>
  </head>
  <body>
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/juego_de_parejas.css"/>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    var cronometro = document.querySelector('#tiempo_juego');
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

          console.log(arrayPosicionesParejas[anterior] + ":" + arrayPosicionesParejas[casilla]);

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
          console.log("fin");
          fin_juego++;
          //tiempo_juego = document.getElementById("tiempo_final").textContent;
          var algo = document.querySelector('#tiempo_juego');
          $("#prueba").val(cronometro[tiempo_juego]);
          $(".tiempo_final").html(cronometro);
          $("#panel_resultados").fadeIn();
          $("html, body").stop().animate({
              scrollTop: $("#juego_de_parejas").offset().top
          }, 500, 'swing'); 
      }
    });

      //CRONOMETRO DE TIEMPO
    function zeroIzq(n){
        return n.toString().replace(/^(\d)$/,'0$1');
    }
    function formatoSegundos(s){
   //        return zeroIzq(Math.floor(s / 3600))+':'+zeroIzq(Math.floor(s%3600 / 60))+':'+zeroIzq(Math.floor((s%3600)%60));
        return zeroIzq(Math.floor(s%3600 / 60))+':'+zeroIzq(Math.floor((s%3600)%60));
    }
    function actualizar(){
        if(fin_juego == 0){
            var dif = Date.now() - inicioConteo;
            dif = Math.round(dif / 1000);
            cronometro.innerHTML = formatoSegundos(dif);
            idTimeout = setTimeout(actualizar,1000);
        }
    }
    function iniciar(){
        clearTimeout(idTimeout);
        inicioConteo = Date.now();
        actualizar();
    }
    //PANEL DE RESULTADOS
    $("#btn_reiniciar").click(function(){
        location.reload(true);
    });
    
    $("#btn_inf_jugada_01").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_01").show();
    });
    
    $("#btn_inf_jugada_02").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_02").show();
    });
    
    $("#btn_inf_jugada_03").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_03").show();
    });
    
    $("#btn_inf_jugada_04").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_04").show();
    });
    
    $("#btn_inf_jugada_05").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_05").show();
    });
      
    $("#btn_inf_jugada_06").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_06").show();
    });
    
    $("#btn_inf_jugada_07").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_07").show();
    });
    
    $("#btn_inf_jugada_08").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_08").show();
    });
    
    $("#btn_inf_jugada_09").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_09").show();
    });
    
    $("#btn_inf_jugada_10").click(function(){
        $("#resultados").hide();
        $("#infografia_jugada").show();
        $(".inf_jugada").hide();
        $("#inf_jugada_10").show();
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
    //COMPARTIR RESULTADOS EN REDES
    window.fbAsyncInit = function() {
        FB.init({
          appId            : '1928749157200161',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v2.12'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $("#btn_compartir_facebook").click(function(){
        var tiempo_juego;
        tiempo_juego = document.getElementById("tiempo_final").textContent;
        FB.ui({
            method: 'share',
            href: 'http://beta.eltiempo.com/deportes/las-10-mejores-jugadas-159307',
            quote:'Estas son las 10 mejores jugadas del Fútbol, mi tiempo fue de '+tiempo_juego+' http://www.eltiempo.com/deportes/futbol-internacional/especial-las-10-mejores-jugadas-futbol-196998',
        }, function(response){});
    });
    
    $("#btn_compartir_twitter").click(function(){
        var tiempo_juego;
        tiempo_juego = document.getElementById("tiempo_final").textContent;
        var url='http://twitter.com/home?status=Mi%20tiempo%20fue%20de%20'+tiempo_juego+'%20http://www.eltiempo.com/deportes/futbol-internacional/especial-las-10-mejores-jugadas-futbol-196998'; 
        window.open(url,'ventanacompartir', 'toolbar=0, status=0, width=650, height=450');
    });
  });
  </script>
  <div id="juego_de_parejas">
    <div id="contenedor_juego"> 
      <div id="cabecera_juego" align="center"><img alt="Juego de Parejas" id="imagen_juego" src="<?php echo base_url(); ?>public/imagenes/titulo_juego.png"/>
        <p>Juega y aprende más.
        </p>
        <label id="tiempo_juego">00:00 </label><span>Tiempo</span>
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
        <input type="text" name="prueba" id="prueba">
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
        <hr/><br/><br/><span id="btn_reiniciar">Reiniciar</span>
      </div>
    </div>
  </div>
  </body>
</html>