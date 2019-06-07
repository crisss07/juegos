//array con palabras
var tablas = ["abaratar", "diluviar", "maltratar", "abarcar", "diseminar", "mandar", "aborrecer", "disentir", "manipular", "acalorar", "disgregar", "mencionar", "acatar", "doblez", "mendigar", "aceptar", "dominar", "mental", "acicalar", "dramatizar", "mudar", "acomodar", "dudar", "mundial", "acoplar", "dudar", "musical", "acorralar", "ecuatorial", "musicalizar", "acusar", "edificar", "natural", "adaptador", "embarcar", "naturalidad", "adecuar", "embaucar", "necedad", "adiestrador", "empezar", "necesidad", "adivinar", "empezar", "negociar", "adjudicador", "emprendedor", "neonatal", "adjudicar", "encantar", "neutral", "administrar", "encasillar", "obesidad", "admirador", "encontrar", "obsequiar", "adoptar", "enfocar", "obsesionar", "adorar", "ensillar", "ocupar", "aerosol", "entrometer", "ofender", "afectar", "escolar", "oficial", "afinidad", "esconder", "oficiar", "alcanzar", "escribir", "ofrendar", "ampliar", "esencial", "orientador", "animar", "espiritual", "oriental", "animosidad", "establecer", "orinar", "aniquilar", "estipular", "patinar", "anticipar", "evadir", "percibir", "ascender", "expedir", "peritoneal", "asesinar", "explorar", "persuadir", "asesor", "facilitar", "plantar", "asiduidad", "favorecer", "policial", "atender", "febril", "prometer", "atrocidad", "financiar", "proseguir", "azuzar", "fragilidad", "pulidor", "balancear", "frivolidad", "purificar", "billar", "funcionar", "racional", "bimestral", "ganar", "racionar", "binocular", "garantizar", "real", "blanqueador", "generar", "rectangular", "blanquear", "generosidad", "regresar", "borrar", "genial", "rentar", "bostezar", "girar", "reptar", "boxear", "glacial", "rescatar", "brevedad", "glaciar", "ritual", "bronceador", "gladiador", "rumiar", "brutal", "gratitud", "saborear", "burbujear", "guardar", "sacar", "cabezal", "habitual", "sal", "caducidad", "habituar", "salir", "calentar", "hexagonal", "saludar", "cantar", "hostal", "salvador", "cantor", "hotel", "sanear", "capacidad", "humedecer", "santidad", "causal", "hundir", "santiguar", "cavidad", "implicar", "separar", "cazar", "importar", "simpatizar", "cañaveral", "humedad", "sanidad", "central", "incondicional", "sobrenatural", "cepillar", "inferior", "soldar", "colocar", "infiltrar", "sumar", "combatir", "ingenuidad", "superior", "compensar", "inicial", "tejer", "competir", "inmoral", "timador", "compresor", "insinuar", "trabajar", "consolar", "integridad", "traer", "contener", "interior", "traicionar", "continental", "interpretar", "trasplantar", "contrariedad", "intrigar", "ungir", "contribuir", "jalar", "unidad", "corral", "jocosidad", "universal", "costillar", "judicial", "untar", "cruzar", "jugar", "urbanidad", "dejar", "jurar", "vecindad", "delinquir", "justificar", "ventilar", "denigrar", "laminar", "veracidad", "dental", "legitimidad", "verdad", "depositar", "lesionar", "vitorear", "desesperar", "luminosidad", "vivir", "desperdiciar", "maldecir", "abanderado", "cocinero", "mesa", "abandonado", "colcha", "mochila", "abanico", "colmillo", "muestra", "abarrotado", "mueve", "abarrotes", "comadreja", "nubes", "abasto", "come", "nublado", "abeja", "como", "ojos", "abortivo", "compra", "olas", "abrasivo", "computadora", "ombligo", "abrigo", "conjuro", "ordena", "absoluto", "consume", "organiza", "abuela", "corre", "oso", "abuelo", "corrige", "pantera", "acarreo", "corta", "para", "acondicionado", "cortinas", "parlante", "acuarela", "cuaderno", "pecas", "acuario", "cuadro", "peces", "acusado", "cuanto", "pecho", "administrativo", "cuchara", "pelo", "adorno", "cuchillo", "pera", "aduana", "cuello", "pera", "adulto", "cuenta", "perfume", "adulto", "desordena", "perro", "diente", "pestañas", "agua", "disco", "piedra", "aire", "domingo", "pierna", "alcantarilla", "elefante", "pintura", "alfombra", "piscis", "almacena", "empresa", "plancha", "almohada", "enchufe", "planeta", "amarillo", "planifica", "amazonas", "ensalada", "playa", "analiza", "escorpio", "pluma", "anonadada", "escribe", "pone", "antes", "espera", "anulares", "estadio", "puerto", "arena", "estima", "quien", "argentina", "estrellas", "rama", "arrecife", "estructura", "recibe", "asume", "estudia", "redacta", "atento", "estupefacta", "regla", "avispa", "eugenesia", "remera", "balanza", "eugenia", "resumen", "banana", "figura", "revisa", "flaca", "rinoceronte", "banco", "folio", "roca", "bandada", "fruta", "rompe", "bandido", "fuente", "ropa", "baño", "galaxias", "rosario", "banquero", "ganado", "saludo", "bota", "gases", "santo", "botana", "gato", "serio", "bote", "genio", "signos", "buena", "gordo", "silla", "bufanda", "guitarra", "sorprendida", "busca", "gusano", "suerte", "caballo", "hormigas", "superpone", "cabello", "ingenio", "surge", "cable", "intento", "tamarindo", "cachetes", "jirafa", "tapado", "cadera", "juega", "teclado", "calzado","teclas", "cama", "jueves", "temperatura", "caminata", "jugo", "termo", "camisa", "ladrillo", "tetilla", "camiseta", "leche", "tierra", "libro", "tocadiscos", "campo", "limpieza", "toma", "capricornio", "llueve", "tonto", "cara", "lluvia", "trampa", "lunar", "trapo", "carmen", "lunes", "universo", "carpeta", "maestra", "vaca", "cejas", "mala", "vaso", "manda", "vende", "chaqueta", "manteca", "venga", "chile", "manzana", "viernes", "cielo", "martes", "volumen", "clavo", "martillo", "cloaca", "mate", "vuelo", "cocina", "media", "zapatillas", "cocina", "memorizar", "zapato"];
var tabla=["escarapela","evo","viracocha","pachamama"];
//obtiene una posicion aleatoria
//var indice = Math.floor(Math.random()*481);
var indice = Math.floor(Math.random()*(tabla.length));
console.log(indice);
//obtiene la palabra en base a la posicion aleatoria
var palabra = tabla[indice];
//obtiene la pregunta en base a la posicion 
var preg= ["Símbolo patrio boliviano","Primer presidente indígena de Bolivia","El dios creador del Inca en tierras altas era conocido como:","La madre tierra se conoce con el nombre:"];



//quita las comillas de la palabra obtenida
var arrayp = palabra.split("");
var container = document.getElementById("container");
var salida = document.getElementById("fallos");
//crea un array vacio
var solucion = [];
var fallos = 0;
var finalGanado=false;
var won=0;
var lost=0;

var puntos=0;
var sumatoria=2; 


//var pregunta="¿cual es la capital de bolivia?";
var caduno="Pista: ";
var pregunta=preg[indice];
var pista=caduno.concat(pregunta);
question.innerHTML ='<H2>'+pista+'</H2>';
for (var i = 0; i < arrayp.length; i++) {
  //añade un valor "-" al final del array solucion
	solucion.push("-");
  //genera la secuencia "- - - -" 
	container.innerHTML = solucion.join(" ");
}

 setTimeout(function() {
      document.querySelector(".time").style.animation =
        "timeCheck 40s infinite linear";
    }, 4000);
console.log(palabra);
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
    			container.innerHTML += "<br>LO CONSEGUISTE !!!! ";
          finalGanado= true;
    			var teclado = document.getElementById('teclado');

          
          
		 		teclado.innerHTML="";
        question.innerHTML="";        
    	  salida.innerHTML = muestraboton();
    		}
    	}
      if (finalGanado){
        won++;
        puntos++;
        console.log(puntos);       
        document.getElementById('puntaje').innerHTML = puntos;
        location = "/juegos/ahorcado/guarda";
        finalGanado=false;
      }
    }else{
    	fallos ++;
      //reemplza el texto en el id fallos en la vista
      salida.innerHTML =' <h5 style="color:#FF0000";> Con ' +(6-fallos)+' fallos Hangi será ahorcado <br></h5>';
      //<h5 style="color:#FF0000";>Con 6 fallos Hangi será ahorcado<br></h5>
      //va colocando la imagen en cada intento fallido <?php echo base_url(); ?>public/ahorcado/img/
    	document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-"+ fallos + ".jpg";
      //var baseurl="<?php echo base_url(); ?>";
     // document.getElementById('imagen').src = baseurl;
    	//salida.innerHTML += tecla+", ";
      //en caso de que se llegue al tope de fallos posibles
    	if (fallos >=6){
    	 container.innerHTML ='<h1 style="color:#FF0000";>PERDISTE !!!!!</h1>';
        lost++;
       //termina el juego y el usuario puede reiniciar el juego 
    	 salida.innerHTML = '<div class="d-flex flex-column align-items-center"><div><h4>La solución era: ' + palabra + '</h4></div><div>' + muestraboton()+'</div></div>';
    	 var teclado = document.getElementById('teclado');
		 teclado.innerHTML="";
    	}
    }
   // x.value = "";
}
function muestraboton(){
  return ('<button type="button" class="btn btn-success" onclick="reiniciar()">Jugar otra vez</button> ')
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
      salida.innerHTML ='<h5 style="color:#FF0000";>Con 6 fallos Hangi será ahorcado<br></h5>';
  	  container.innerHTML = solucion.join(" ");
      question.innerHTML ='<H2>'+pista+'</H2>';
      document.getElementById('lost').innerHTML = lost;
      document.getElementById('win').innerHTML = won;
       document.getElementById('puntaje').innerHTML = puntos;
      document.getElementById('imagen').src = "https://jadigar.neocities.org/codepen/ahorcado-0.jpg";

      teclado.innerHTML = '<br><br><br><h1 align="center">Hangi: el ahorcado</h1><p></p> <button id = "a" type="button" class="btn btn-primary" onclick="enviado(\'a\')">A</button>			    <button id = "b" type="button" class="btn btn-primary" onclick="enviado(\'b\')">B</button>			    <button id = "c" type="button" class="btn btn-primary" onclick="enviado(\'c\')">C</button>			    <button id = "d" type="button" class="btn btn-primary" onclick="enviado(\'d\')">D</button>			    <button id = "e" type="button" class="btn btn-primary" onclick="enviado(\'e\')">E</button>			    <button id = "f" type="button" class="btn btn-primary" onclick="enviado(\'f\')">F</button>      <button id = "g" type="button" class="btn btn-primary" onclick="enviado(\'g\')">G</button>			    <button id = "h" type="button" class="btn btn-primary" onclick="enviado(\'h\')">H</button>			    <button id = "i" type="button" class="btn btn-primary" onclick="enviado(\'i\')">I</button>			    <button id = "j" type="button" class="btn btn-primary" onclick="enviado(\'j\')">J</button>			    <button id = "k" type="button" class="btn btn-primary" onclick="enviado(\'k\')">K</button>			    <button id = "l" type="button" class="btn btn-primary" onclick="enviado(\'l\')">L</button>			    <button id = "m" type="button" class="btn btn-primary " onclick="enviado(\'m\')">M</button> 				<button id = "n" type="button" class="btn btn-primary"onclick="enviado(\'n\')">N</button>			    <button id = "ñ" type="button" class="btn btn-primary"onclick="enviado(\'ñ\')">Ñ</button>			    <button id = "o" type="button" class="btn btn-primary"onclick="enviado(\'o\')">O</button>			    <button id = "p" type="button" class="btn btn-primary"onclick="enviado(\'p\')">P</button>			    <button id = "q" type="button" class="btn btn-primary"onclick="enviado(\'q\')">Q</button>			    <button id = "r" type="button" class="btn btn-primary"onclick="enviado(\'r\')">R</button>			    <button id = "s" type="button" class="btn btn-primary"onclick="enviado(\'s\')">S</button>			    <button id = "t" type="button" class="btn btn-primary"onclick="enviado(\'t\')">T</button>			    <button id = "u" type="button" class="btn btn-primary"onclick="enviado(\'u\')">U</button>			    <button id = "v" type="button" class="btn btn-primary"onclick="enviado(\'v\')">V</button>			    <button id = "w" type="button" class="btn btn-primary"onclick="enviado(\'w\')">W</button>			    <button id = "x" type="button" class="btn btn-primary"onclick="enviado(\'x\')">X</button>			    <button id = "y" type="button" class="btn btn-primary"onclick="enviado(\'y\')">Y</button>			    <button id = "z" type="button" class="btn btn-primary" onclick="enviado(\'z\')">Z</button>'
  }
}