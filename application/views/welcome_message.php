<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Juegos</title>
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

	<div class="jumbotron text-center">
	  <h1>JUEGOS</h1>
	  <p>Bienvenido a nuestra consola de juegos!</p> 
	</div>

	<div class="container">

	  <div class="row">

		<div class="col-md-6 col-sm-12">
			<div class="card">
			  <img src="<?php echo base_url('/public/img/ahorcado.jpg'); ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">EL AHORCADO</h5>
			    <p class="card-text">
			    	El juego conciste en encontrar la respuesta 
			    	a la pregunta, tienes 1 minuto para poder
			    	superar esta prueba.
			    	Si consigues encontrar todas las palabras tendras
			    	10 puntos ganados.
			    </p>
			    <a href="#" class="btn btn-info">COMENZAR A JUGAR</a>
			  </div>
			</div>
		</div>

	  	<div class="col-md-6 col-sm-12">
	    	<div class="card">
	    	  <img src="<?php echo base_url('/public/img/sopa.jpg'); ?>" class="card-img-top" alt="...">
	    	  <div class="card-body">
	    	    <h5 class="card-title">SOPA DE LETRAS</h5>
	    	    <p class="card-text">
					El juego conciste en encontrar las palabras dentro
					de la sopa de letras, tienes 2 minutos para poder
					superar esta prueba.
					Si consigues encontrar todas las palabras tendras
					10 puntos ganados.
	    	    </p>
	    	    <a href="#" class="btn btn-warning">COMENZAR A JUGAR</a>
	    	  </div>
	    	</div>
	    </div>
	    
	</div>
	<p></p>
	<div class="row">
	    <div class="col-md-6 col-sm-12">
	    	<div class="card">
	    	  <img src="https://www.macgamestore.com/images_screenshots/the-cooking-game-50592.jpg" class="card-img-top" alt="...">
	    	  <div class="card-body">
	    	    <h5 class="card-title">TRIVIA</h5>
	    	    <p class="card-text">
					El juego conciste en escoger la respuesta correcta
					lo mas rapido posible, tienes 2 minutos para poder
					superar esta prueba.
					Si consigues encontrar todas las palabras tendras
					10 puntos ganados.
	    	    </p>
	    	    <a href="#" class="btn btn-success">COMENZAR A JUGAR</a>
	    	  </div>
	    	</div>
	    </div>
	    <div class="col-md-6 col-sm-12">
	    	<div class="card">
	    	  <img src="https://www.macgamestore.com/images_screenshots/the-cooking-game-50592.jpg" class="card-img-top" alt="...">
	    	  <div class="card-body">
	    	    <h5 class="card-title">ENPAREJADOS</h5>
	    	    <p class="card-text">
	    	    	El juego conciste en encontrar la respuesta correcta
	    	    	en un conjunto de cartas, tienes 2 minutos para poder
	    	    	superar esta prueba.
	    	    	Si consigues encontrar todas las palabras tendras
	    	    	10 puntos ganados.
	    	    </p>
	    	    <a href="#" class="btn btn-primary" disabled>PROXIMAMENTE</a>
	    	  </div>
	    	</div>
	    </div>
	  </div>

	</div>

</body>
</html>