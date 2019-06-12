<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="UTF-8">
	<title>Ahorcado by PMGM</title>
	
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/ahorcado/lib/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/popper.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>public/ahorcado/lib/bootstrap.min.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/ahorcado/css/ahorcado.css">  
</head>
<body>



	<div class="container blue">
		  <input type="hidden" class="form-control" id="id_persona" name="id_persona" value="<?php echo $id_persona; ?>">


		
			<div class="row">
			<div class="col-md-4 " >
				
			</div>
			<div class="col-md-4 marron home" align="center">
					<p></p>
				<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/logo.png" alt="ahorcado" width="50%">

				<p></p>
				<img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/ahorcado.png" alt="ahorcado" width="60%">
				<p></p>

				
				<a  href="<?php echo site_url('ahorcado'); ?>" >
					<button  type="button" class="btn cafe " ><h3>JUGAR</h3></button>
				</a>
				<p></p>

				


				<button type="button" class="btn cafe " data-toggle="modal" data-target="#modalinfo"><h3>AYUDA</h3></button>
				<p></p>
			</div>
		</div>



	

		
		

	
		
		
		
		
		</div>


<!-- Button trigger modal -->


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
      <div class="modal-body" align="justify">     
        <p></p>
        Este es el juego clasico del ahorcado recuerda que tienes 6 intentos para resolver la pregunta.
        <br>
        <b>
        	Solo puedes jugar 3 veces por dia
        </b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>  
      </div>
    </div>
  </div>
</div>	
	</body>
	</html>
