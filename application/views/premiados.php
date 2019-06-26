<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
   
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/ahorcado/css/ahorcado.css"> 
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 

    <title>CRUD</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
  </nav>


  <div class="container contenedor">
  <br>
  <br>

  <div class="row">
  <div class="col-lg-12">
    
      <!-- Button trigger modal -->
   <h2>Listado de premios entregados</h2>
   
   <p></p>
   <br>

    <!-- Modal -->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ahorcado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post"  action="<?php echo site_url('Ahorcado/create')?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Pregunta</label>
              <input type="text" class="form-control" name="pregunta" aria-describedby="emailHelp" placeholder=".....">             
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Respuesta <span style="color:red"> (Solo una palabra y sin ascentos)</span></label>
              <input type="text" class="form-control" name="respuesta" aria-describedby="emailHelp" placeholder=".....">            
            </div>


         
          
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" value="save">Continuar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>          
          </div>
          </form>
          </div>
          
        </div>
      </div>
    </div>


    <?php $conteo=1; ?>


   <table class="table" id="personas_table">
  <thead class="thead-primary">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Premiado</th>
      <th scope="col">Puntos</th>
      <th scope="col">Premio</th>         
    </tr>
  </thead>
  <tbody>
    
     <?php foreach($cobrado as $rowc) {?>
    <tr>
      <th ><?php echo $rowc->fecha; ?></th>
      <td><?php echo $rowc->nombres.' '.$rowc->ap.' '.$rowc->am; ?></td>
        <td><?php echo $rowc->puntaje; ?></td> 
      <td><?php echo $rowc->premio; ?></td>   
    </tr>
    <?php } ?>
   
  </tbody>
</table>
</div><!--col lg-6-->
</div>
<div style="height: 60px;" class="col-lg-12 col-md-12" align="center">
                    <a href="<?php echo base_url('/configuraciones/inicio'); ?>" class="btn btn-primary btn-lg">MENU PRINCIPAL</a>
                </div>
  </div><!--container-->
    </body>
</html>

<script>
  
  $(document).ready( function () {
    $('#ahorcado_table').DataTable(

      {
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }

      );

       $('#personas_table').DataTable(

      {
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
  }

      );

} );


        



</script>

<script>
  function agregarform(datos)
        {
             d=datos.split('||');
              $('#usuario').val(d[0]);
              $('#puntaje').val(d[1]);
              $('#id').val(d[2]);  
        }
</script>
