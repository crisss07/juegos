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
    

    <!-- Modal -->
    <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Entrega de premios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post"  action="<?php echo site_url('Entrega/guarda')?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input type="text" class="form-control" name="usuario" id="usuario" placeholder="....." readonly="">             
            </div>
            <input type="text" class="form-control" name="usuario_id" id="usuario_id" placeholder="....." readonly="" hidden> 
            <input type="text" class="form-control" name="id" id="id" placeholder="....." readonly="" hidden>
            <div class="form-group">
              <label for="exampleInputEmail1">Puntaje</label>
              <input type="text" class="form-control" name="puntaje" id="puntaje" placeholder="....." readonly="">             
            </div>        
          
              <div class="form-group">
                 <label for="exampleInputEmail1">Premio</label>
              <select class="selectpicker" id="premio_id" name="premio_id">
               <?php foreach ($premios as $tp) : ?>                                    
                                    <option value="<?php echo $tp->id; ?>"><?php echo $tp->premio.'-por-'.$tp->puntaje.' pts'; ?></option>
                            <?php endforeach; ?>
               </select>           
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


    <?php $cont=1; ?>


   <table class="table" id="ahorcado_table">
  <thead class="thead-primary">
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Usuario</th>
      <th scope="col">Puntos</th>   
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    
   <?php foreach($puntajes as $row) {
   $datos = $row->persona_id."||".
   $row->puntaje."||".
   $row->nombres."||".
   $row->ap."||".
   $row->am."||".
   $row->id;
   ?>
    <tr>
      <th ><?php echo $cont++; ?></th>
      <td><?php echo $row->nombres.' '.$row->ap.' '.$row->am; ?></td>
      <td><?php echo $row->puntaje; ?></td> 
      <td>
        <button type="button" class="btn btn-success footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"> <i class="fa fa-trophy fa-1x"></i> premiar                                                       
                                                    </button>                   
      </td>
    </tr>
    <?php } ?>
   
  </tbody>
</table>
</div><!--col lg-6-->



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

       $('#personasss_table').DataTable(

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
              $('#usuario_id').val(d[0]);
              $('#puntaje').val(d[1]);
              var nombre=d[2]+" "+d[3]+" "+d[4];
              $('#usuario').val(nombre);
             
              $('#id').val(d[5]);  
        }
</script>
