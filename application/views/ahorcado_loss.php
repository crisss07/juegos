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
<body >
  <div class="container  ">
      <input type="hidden" class="form-control" id="id_persona" name="id_persona" value="<?php echo $id_persona; ?>">



    
    <div class="row">
      <div class="col-md-3 " >        
      </div>
      <div class="col-md-6 marron loss" align="center">
        <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/logo.png" alt="ahorcado" width="60%"> 
        <p></p>
        <br>
              <img  id="imagen"  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/imgpng/splash.png" alt="ahorcado" width="40%"><p></p>
        <img  id="imagen"  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/imgpng/perdiste.png" alt="ahorcado" width="50%">
        <br>
        
                 <a  href="<?php echo site_url('ahorcado'); ?>/nuevo/<?php echo $id_persona; ?> " >
          <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/new.png"   width="50%">
    </a>
    <a  href="<?php echo site_url(); ?>" >
          <img  class="img-fluid" src="<?php echo base_url(); ?>public/ahorcado/buttons/menu.png"   width="20%">
    </a> 
    <br>
    <p></p>



      </div>
    </div>

    


    
    
    






  </body>
  </html>
