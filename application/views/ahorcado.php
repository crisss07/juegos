<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="UTF-8">
	<title>Ahorcado by PMGM</title>
	<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>-->
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/ahorcado/lib/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/popper.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/bootstrap.min.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/ahorcado/css/ahorcado.css">  
</head>
<body onload="inicia();" >
	<div class="container  ">
		  <input type="hidden" class="form-control" id="id_persona" name="id_persona" value="<?php echo $id_persona; ?>">
		  

		<div class="row">
			<div class="col-md-3 " >							
			</div>
			<div class="col-md-2 contador " >
			<!--RONDA <span id="puntaje"> <?php echo ($ronda->contador)+1 ?> /3</span>-->
			</div>
		
			<div class="col-md-2 contador " >
				PUNTAJE <span id="puntaje"> <?php echo $puntaje_id->suma ?></span>
			</div>
			<div class="col-md-2 contador " align="right">
				<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/moneda.png" alt="ahorcado" width="10%"><span id="vidas"> 6</span>
			</div>
		</div>


		
		<div class="row">
			<div class="col-md-3 " >				
			</div>
			<div class="col-md-6 infor" align="center">
				<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/logo.png" alt="ahorcado" width="60%">
				<p>
					
				</p>
				<span class="tiempo" id="time"> 01:00</span>
				<p>
						<img  id="imagen"  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/img/ahorcado-0.jpg" alt="ahorcado" width="60%">
				</p>
				<p>
					<br>									<!--<h1 align="center">HANGI: EL AHORCADO</h1><p></p>	-->
				<button id = "a" type="button" class="btn naranja " onclick="enviado('a')">A</button>
				<button id = "b" type="button" class="btn naranja " onclick="enviado('b')">B</button>
				<button id = "c" type="button" class="btn naranja " onclick="enviado('c')">C</button>
				<button id = "d" type="button" class="btn naranja " onclick="enviado('d')">D</button>
				<button id = "e" type="button" class="btn naranja " onclick="enviado('e')">E</button>
				<button id = "f" type="button" class="btn naranja " onclick="enviado('f')">F</button>    
				<button id = "g" type="button" class="btn naranja " onclick="enviado('g')">G</button>
				<button id = "h" type="button" class="btn naranja " onclick="enviado('h')">H</button>
				<button id = "i" type="button" class="btn naranja " onclick="enviado('i')">I</button>
				
				<button id = "j" type="button" class="btn naranja " onclick="enviado('j')">J</button>
				<button id = "k" type="button" class="btn naranja " onclick="enviado('k')">K</button>
				<button id = "l" type="button" class="btn naranja " onclick="enviado('l')">L</button>
				<button id = "m" type="button" class="btn naranja " onclick="enviado('m')">M</button>
				<button id = "n" type="button" class="btn naranja " onclick="enviado('n')">N</button>
				<button id = "ñ" type="button" class="btn naranja " onclick="enviado('ñ')">Ñ</button>
				<button id = "o" type="button" class="btn naranja " onclick="enviado('o')">O</button>
				<button id = "p" type="button" class="btn naranja " onclick="enviado('p')">P</button>
				<button id = "q" type="button" class="btn naranja " onclick="enviado('q')">Q</button>

				<button id = "r" type="button" class="btn naranja " onclick="enviado('r')">R</button>
				<button id = "s" type="button" class="btn naranja " onclick="enviado('s')">S</button>
				<button id = "t" type="button" class="btn naranja " onclick="enviado('t')">T</button>
				<button id = "u" type="button" class="btn naranja " onclick="enviado('u')">U</button>
				<button id = "v" type="button" class="btn naranja " onclick="enviado('v')">V</button>
				<button id = "w" type="button" class="btn naranja " onclick="enviado('w')">W</button>
				<button id = "x" type="button" class="btn naranja " onclick="enviado('x')">X</button>
				<button id = "y" type="button" class="btn naranja " onclick="enviado('y')">Y</button>
				<button id = "z" type="button" class="btn naranja " onclick="enviado('z')">Z</button>
				</p>
				<p class="text-center faltante" id="container">
					
				</p>
				

			</div>
		</div>


	

		
		
		<div class="row">
			<div class="col-md-3 " >
				
			</div>
			<div class="col-md-6 verde" id="question">				
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 " >
				
			</div>
		
			<div class="col-md-6 verde" align="right" id="prueba">

			<button type="button" class="btn inf " data-toggle="modal" data-target="#modalinfo"><h3>?</h3></button>
			
		
				<p></p>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 " >				
			</div>			
			<div class="col-md-6 marron" align="center" id="fallos">						
			</div>
		</div>


		<!-- Modal -->
<div class="modal fade" id="modalinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">   Bienvenido Amig@:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
        <p></p>
          <p></p>
        Este es el juego clasico del ahorcado recuerda que tienes 6 intentos para resolver la pregunta.
        <br>
        <b>
        Solo puedes jugar 3 veces por dia
        </b>
      </div>
      <div class="modal-footer">
      	<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/entendido.png" alt="ahorcado" data-dismiss="modal" width="30%">      
      </div>
    </div>
  </div>
</div>	


<!-- Modal cierre de tiempo -->
<div class="modal fade" id="modalTiempo" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalTiempoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/logo.png" alt="ahorcado" width="60%">	
        
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 -->      </div>
      <div class="modal-body" align="center">
        <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/imgpng/tiempo.png" alt="ahorcado" width="60%">	
      </div>
      <div class="modal-footer" align="center">

      	<a  href="<?php echo site_url('ahorcado'); ?>/nuevo/<?php echo $id_persona; ?> " >
      		<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/new.png"   width="70%">
     
					
		</a>

		<a  href="<?php echo site_url(); ?>" >
				<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/menu.png"   width="70%">
		</a>        
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Fin modal cierre de tiempo -->
		<script>
			//array con palabras
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
                    $("#modalTiempo").modal('show');
                    // console.log('termino');

                }
            }, 1000);
        }
  function inicia() {
            // $("#sopa_contenidos").toggle('slow');
            // $("#txt_tutorial").toggle('slow');
            // $("#time").toggle('slow');
            var oneMinutes = 60,
            display = document.querySelector('#time');
            startTimer(oneMinutes, display);
        }

        // window.onload = function () {
        //     var fiveMinutes = 60 * 5,
        //         display = document.querySelector('#time');
        //     startTimer(fiveMinutes, display);
        // };

var tabla=[<?php foreach ($preguntas as $row) {
	echo "'".$row->respuesta."',";} ?>];
//var tabla=["escarapela","evo","viracocha","pachamama"];
//obtiene una posicion aleatoria
//var indice = Math.floor(Math.random()*481);
var indice = Math.floor(Math.random()*(tabla.length));
console.log(indice);
//obtiene la palabra en base a la posicion aleatoria
var palabra = tabla[indice];
//obtiene la pregunta en base a la posicion 
//var preg= ["Símbolo patrio boliviano","Primer presidente indígena de Bolivia","El dios creador del Inca en tierras altas era conocido como:","La madre tierra se conoce con el nombre:"];
var preg= [<?php foreach ($preguntas as $row) {
	echo "'".$row->pregunta."',";} ?>

];

//quita las comillas de la palabra obtenida
var arrayp = palabra.split("");
var container = document.getElementById("container");
var salida = document.getElementById("fallos");
var coins = document.getElementById("vidas");
//crea un array vacio
var solucion = [];
var fallos = 0;
var finalGanado=false;
var won=0;
var lost=0;
var puntos=0;
var sumatoria=2; 
var rutawin= '<?php echo base_url(); ?>public/ahorcado/ganaste.png';
//var pregunta="¿cual es la capital de bolivia?";
var caduno="Pista: ";
var pregunta=preg[indice];
var pista=caduno.concat(pregunta);
question.innerHTML ='<H3>'+pista+'</H3>';
for (var i = 0; i < arrayp.length; i++) {
  //añade un valor "-" al final del array solucion
	solucion.push("-");
  //genera la secuencia "- - - -" 
	container.innerHTML = solucion.join(" ");
}
//console.log(palabra);
//ingresa la tecla clickeada
function enviado(tecla) {
    var boton =document.getElementById(tecla);
    //desabilita el boton virtual
    boton.disabled = true;
    //busca la letra dentro la palabra y devuelve la posicion de la letra caso contrario -1 por falso
    var encontrado = palabra.indexOf(tecla);
    console.log(encontrado);
    
    if ( encontrado != -1){
    	
    	for (var j = 0; j < arrayp.length; j++) {
        //compara la posicion j de la palabra con la letra clickeada
    		if (arrayp[j] == tecla){
          //inserta la letra en el array solucion
    			solucion[j] = tecla;    			
    		}
        //actualiza el array solucion
    		container.innerHTML = solucion.join(" ");
        console.log(solucion.join(" "));
        //consulta si aun quedan letras por adivinar
    		var terminado = solucion.indexOf("-");
    		if (terminado == -1){
    			//container.innerHTML = "";
    			//document.getElementById('imagen').src = rutawin;
          		finalGanado= true;
    			//var teclado = document.getElementById('teclado');
    			//time.innerHTML="";
		 		//teclado.innerHTML="";
        		//question.innerHTML="";        
    	  //salida.innerHTML = muestraboton();
    	  		//prueba.innerHTML = "";
    		}
    	}
      if (finalGanado){
        won++;
        puntos++;
        console.log(puntos);
        //document.getElementById('puntaje').innerHTML = puntos;
        finalGanado=false;
        //guarda el id de la persona y el puntaje, estableciendo el tiempo en milisegundos
        setTimeout(guarda_data,1); 
      }
    }else{
    	fallos ++;
      //reemplza el texto en el id fallos en la vista
      //salida.innerHTML =' <h5 style="color:#FF0000";> Con ' +(6-fallos)+' fallos Hangi será ahorcado <br></h5>';
      coins.innerHTML =' '+ (6-fallos);
      //<h5 style="color:#FF0000";>Con 6 fallos Hangi será ahorcado<br></h5>
      //va colocando la imagen en cada intento fallido <?php echo base_url(); ?>public/ahorcado/img/
    	document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-"+ fallos + ".jpg";
      //var baseurl="<?php echo base_url(); ?>";
     // document.getElementById('imagen').src = baseurl;
    	//salida.innerHTML += tecla+", ";
      //en caso de que se llegue al tope de fallos posibles
    	if (fallos >=6){
    	 //container.innerHTML ='<h1 style="color:#FF0000";>PERDISTE !!!!!</h1>';
        lost++;
       //termina el juego y el usuario puede reiniciar el juego 
    	 //salida.innerHTML = '<div class="d-flex flex-column align-items-center"><div>' + muestraboton()+' <br></div></div>';
    	//salida.innerHTML = "";
    	question.innerHTML="";
    	prueba.innerHTML="";
    	 
    	 //var teclado = document.getElementById('teclado');
		 //teclado.innerHTML="";
		 setTimeout(guarda_perdida,1000); 
    	}
    }
   // x.value = "";
}
function guarda_data(){
	
	location = "/juegos/ahorcado/guarda/"+ <?php echo $id_persona;?>+"/"+6;
}
function guarda_perdida(){
	
	location = "/juegos/ahorcado/guarda_loss/"+ <?php echo $id_persona;?>+"/"+0;
}

function muestraboton(){
  return ('<button type="button" class="btn btn-success" onclick="reiniciar()" align="center">Jugar otra vez</button> <p>')
}
function reiniciar(){
  indice = Math.floor(Math.random()*(tabla.length));
  palabra = tabla[indice];


pregunta=preg[indice];
pista=caduno.concat(pregunta);
  arrayp = palabra.split("");
  console.log(palabra);
  solucion = [];
  fallos = 0;
    for (var i = 0; i < arrayp.length; i++) {
  	  solucion.push("-");
      //salida.innerHTML ='<h5 style="color:#FF0000";>Con 6 fallos Hangi será ahorcado<br></h5>';
      salida.innerHTML="";
       prueba.innerHTML = '<button type="button" class="btn cafe " data-toggle="modal" data-target="#modalinfo"><h2>?</h2></button><p></p>';
  	  container.innerHTML = solucion.join(" ");
      question.innerHTML ='<H2>'+pista+'</H2>';
      vidas.innerHTML = " 6";
      //document.getElementById('lost').innerHTML = lost;
      //document.getElementById('win').innerHTML = won;
       document.getElementById('puntaje').innerHTML = <?php echo $puntaje_id->suma ?>;
      document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-0.jpg";

      teclado.innerHTML = '<br><button id = "a" type="button" class="btn naranja" onclick="enviado(\'a\')">A</button>			    <button id = "b" type="button" class="btn naranja" onclick="enviado(\'b\')">B</button>			    <button id = "c" type="button" class="btn naranja" onclick="enviado(\'c\')">C</button>			    <button id = "d" type="button" class="btn naranja" onclick="enviado(\'d\')">D</button>			    <button id = "e" type="button" class="btn naranja" onclick="enviado(\'e\')">E</button>			    <button id = "f" type="button" class="btn naranja" onclick="enviado(\'f\')">F</button>      <button id = "g" type="button" class="btn naranja" onclick="enviado(\'g\')">G</button>			    <button id = "h" type="button" class="btn naranja" onclick="enviado(\'h\')">H</button>			    <button id = "i" type="button" class="btn naranja" onclick="enviado(\'i\')">I</button>			    <button id = "j" type="button" class="btn naranja" onclick="enviado(\'j\')">J</button>			    <button id = "k" type="button" class="btn naranja" onclick="enviado(\'k\')">K</button>			    <button id = "l" type="button" class="btn naranja" onclick="enviado(\'l\')">L</button>			    <button id = "m" type="button" class="btn naranja " onclick="enviado(\'m\')">M</button> 				<button id = "n" type="button" class="btn naranja"onclick="enviado(\'n\')">N</button>			    <button id = "ñ" type="button" class="btn naranja"onclick="enviado(\'ñ\')">Ñ</button>			    <button id = "o" type="button" class="btn naranja"onclick="enviado(\'o\')">O</button>			    <button id = "p" type="button" class="btn naranja"onclick="enviado(\'p\')">P</button>			    <button id = "q" type="button" class="btn naranja"onclick="enviado(\'q\')">Q</button>			    <button id = "r" type="button" class="btn naranja"onclick="enviado(\'r\')">R</button>			    <button id = "s" type="button" class="btn naranja"onclick="enviado(\'s\')">S</button>			    <button id = "t" type="button" class="btn naranja"onclick="enviado(\'t\')">T</button>			    <button id = "u" type="button" class="btn naranja"onclick="enviado(\'u\')">U</button>			    <button id = "v" type="button" class="btn naranja"onclick="enviado(\'v\')">V</button>			    <button id = "w" type="button" class="btn naranja"onclick="enviado(\'w\')">W</button>			    <button id = "x" type="button" class="btn naranja"onclick="enviado(\'x\')">X</button>			    <button id = "y" type="button" class="btn naranja"onclick="enviado(\'y\')">Y</button>			    <button id = "z" type="button" class="btn naranja" onclick="enviado(\'z\')">Z</button>'
  }
}

		</script>
	</body>
	</html>
