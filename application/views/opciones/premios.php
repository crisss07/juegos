


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
		.subtitulo{
			font-family: 'Luckiest Guy', cursive;
			/*font-size: 50px;*/
			/*color: #ff0000;*/
			color: #FE2E2E;
			/*font-family: "Kanit";*/
			font-size: 40px;
			line-height: 1em;
			margin: 0;
			/*position: absolute;*/
			text-align: center;
			top: 50%;
			/*transform: translateY(-50%);*/
			/*width: 100%;*/
			text-shadow: .1em .1em .2em rgba(0, 0, 0, 0.6);
			padding-bottom: 50px;
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
	      background: url("<?php echo base_url('public/img/fp.jpg') ?>") no-repeat center center; 
	       -webkit-background-size: cover;
	       -moz-background-size: cover;
	       -o-background-size: cover;
	       background-size: cover;
	    } 

	    .contenidos1{
	        font-family: 'Handlee', cursive;
	        font-size: 30px;
	        color: #0000FF;
	        font-weight: bolder;
	    }
	    .contenidos2{
	        font-family: 'Handlee', cursive;
	        font-size: 24px;
	        color: #000000;
	        font-weight: bolder;
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

	<div class="container">
		<h1 class="subtitulo">PREMIOS</h1>
	  	<div class="row">
		  	<?php foreach ($cosas as $premios) { ?>
		  	<div class="col-md-6 col-sm-12">
		    	<div class="card">
		    	  
		    	  <div class="card-body">
		    	    <h5 class="card-title contenidos1"><?php echo $premios->premio; ?></h5>
		    	    <p class="card-text contenidos2">Puede canjear <?php echo $premios->premio; ?> con <?php echo $premios->puntaje; ?> puntos que acumule en los juegos</p>
		    	  </div>
		    	</div>
		    </div>
		    <?php } ?>
	    
		</div>
	
	
</body>
</html>