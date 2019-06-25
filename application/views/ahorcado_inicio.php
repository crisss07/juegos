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
      <div class="col-md-6 infor" align="center">
        <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/logo.png" alt="ahorcado" width="60%">
        <p>          
        </p>
        
        <p class="informacion">
          El juego consiste en encontrar la respuesta a la pregunta planteada, letra a letra, cada fallo que cometas iras ahorcándote poco a poco, cuentas con 1 minuto para poder superar esta prueba. Cada palabra correcta que encuentres sumara 6 puntos ganados.
        </p>
        <p>
             <a href="<?php echo site_url('Ahorcado/nuevo/');?><?php echo $id_persona; ?>">   <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/jugar.png"   width="20%"></a> 

        </p>
   
       
        

      </div>
    </div>


  

    
   
  


    <!-- Modal -->
 


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

  </body>
  </html>
