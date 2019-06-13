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
			color: #f4bb41;
			/*font-family: "Kanit";*/
			font-size: 72px;
			line-height: 1em;
			margin: 0;
			/*position: absolute;*/
			text-align: center;
			top: 50%;
			/*transform: translateY(-50%);*/
			/*width: 100%;*/
			text-shadow: .1em .1em .2em rgba(0, 0, 0, 0.6);
		}
		.contenidos{
	        font-family: 'Handlee', cursive;
	        font-size: 28px;
	        color: #ffffff;
	        font-weight: bolder;
	    }
	    #txt_tutorial {
	      position: absolute;
	      left: 0px;
	      top: 0px;
	      z-index: +1;
	      /*background: #ff0000;*/
	    }
	    .cabecera {
	      /*background:url("http://localhost/juegos/public/img/fnd.jpg") no-repeat !important;*/
	      /*padding-top:100px;*/
	      /*background-size:cover;*/
	      /*height: 100%;*/
	      /*background-position: center;*/
	      /*background-repeat: no-repeat;*/
	      /*background-size: cover;*/
	      /*font-family: 'Orbitron', sans-serif;*/
	      background: url("<?php echo base_url('public/img/fp1.jpeg') ?>") no-repeat center center; 
	       -webkit-background-size: cover;
	       -moz-background-size: cover;
	       -o-background-size: cover;
	       background-size: cover;
	    } 
	    .botones{
			
			text-align: center;
			top: 50%;
			/*transform: translateY(-50%);*/
			/*width: 100%;*/
			
			padding-bottom: 50px;
		}
	</style>
</head>
<body>

	<div class="jumbotron text-center cabecera" >
	  <h1 class="titulo">JUEGOS</h1>
	  <p class="contenidos">Bienvenido a nuestra consola de juegos!</p> 
	</div>
	<div class="container botones">
		<a href="<?php echo base_url('/') ?>" class="btn btn-info">Inicio</a>
		<a href="<?php echo base_url('/opciones/premios') ?>" class="btn btn-warning">Premios</a>
		<a href="#" class="btn btn-danger">Información</a>
		<a href="#" class="btn btn-success">Ranking</a>
		<a href="#" class="btn btn-primary">Ranking personal</a>	
	</div>

	<div class="container-fluid">

	  <div class="row">

		<div class="col-xs-6 col-md-6">
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
			    <a href="<?php echo base_url('/ahorcado/') ?>" class="btn btn-info">COMENZAR A JUGAR</a>
			  </div>
			</div>
		</div>

	  	<div class="col-xs-6 col-md-6">
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
	    	    <a href="<?php echo base_url('/sopa/inicia') ?>" class="btn btn-warning">COMENZAR A JUGAR</a>
	    	  </div>
	    	</div>
	    </div>
	    
	</div>
	<p></p>
	<div class="row">
	    <div class="col-xs-6 col-md-6">
	    	<div class="card">
	    	  <img src="<?php echo base_url('/public/img/trivia.jpg'); ?>" class="card-img-top" alt="...">
	    	  <div class="card-body">
	    	    <h5 class="card-title">TRIVIA</h5>
	    	    <p class="card-text">
					El juego conciste en encontrar la respuesta correcta
	    	    	en un conjunto de cartas, tienes 2 minutos para poder
	    	    	superar esta prueba.
	    	    	Si consigues encontrar todas las palabras tendras
	    	    	10 puntos ganados.
	    	    </p>
	    	    <a href="<?php echo base_url('/trivia') ?>" class="btn btn-success">COMENZAR A JUGAR</a>
	    	  </div>
	    	</div>
	    </div>
	    <div class="col-xs-6 col-md-6">
	    	<div class="card">
	    	  <img src="<?php echo base_url('/public/img/emparejados.jpg'); ?>" class="card-img-top" alt="...">
	    	  <div class="card-body">
	    	    <h5 class="card-title">EMPAREJADOS</h5>
	    	    <p class="card-text">
	    	    	El juego conciste en escoger la pregunta con su respuesta correcta
					lo mas rapido posible, tienes 3 minutos para poder
					superar esta prueba.
					Si consigues encontrar todas las palabras tendras
					30 puntos ganados.
	    	    </p>
	    	    <a href="#" class="btn btn-primary" disabled>PROXIMAMENTE</a>
	    	  </div>
	    	</div>
	    </div>
	  </div>

	</div>

</body>
</html>