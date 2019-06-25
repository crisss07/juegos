<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista de preguntas del juego emparejados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <script type="text/javascript">
      function mostrarModal(titulo, pregunta, respuesta, img_pregunta, img_respuesta) {
        $("#modalTitle").html(titulo);
        $("#myModal").modal("show");
        $("#pregunta").val(pregunta);
        $("#respuesta").val(respuesta);
        
      }
    </script>
   
  <style type="text/css">
    .recortar{
      height: 100px;
      width: 100px;
    }
    
  </style>
</head>
<body>

<div class="container">
  <h2>Lista de preguntas de Emparejados</h2>
  <!-- Button to Open the Modal 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    
    Agregar preguntas
  </button>-->
  <button type="button" class="btn btn-primary" onclick="mostrarModal('Crear pregunta', ' ', ' ', ' ', ' ')">Crear pregunta</button>
  <div class="table-responsive">
    <?php $cont=1; ?>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nro</th>
        <th>Pregunta</th>
        <th>Pregunta imagen</th>
        <th>Respuesta</th>
        <th>Respuesta imagen</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($emparejados as $datos):  ?>
        <tr>
          <td><?php echo $cont; $cont++; ?></td>
          <td hidden> <?php echo $datos->id ?> </td>
        <td><?php echo $datos->pregunta ?></td>
        <td><img class="recortar" src="<?php echo base_url(); ?>public/img_emparejados/<?php echo $datos->img_pregunta ?>"></td>
        <td><?php echo $datos->respuesta  ?></td>
        <td><img class="recortar" src="<?php echo base_url(); ?>public/img_emparejados/<?php echo $datos->img_respuesta ?>"></td>
        
        <td>
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $lista ?>')">Editar</button> --> 
          <a class="btn btn-danger" href="<?php echo base_url(); ?>/Emparejados/eliminar/<?php echo $datos->id ?>">Eliminar</a>
         
          <!-- <button type="button" class="btn btn-primary" onclick="mostrarModal('Editar pregunta',  '<?php echo $datos->pregunta ?>', '<?php echo $datos->respuesta  ?>', '',  '')">Editar</button> -->
        </td>
      </tr>
      <?php endforeach ?>
      
      
    </tbody>
  </table>
  </div>

  <!-- The Modal -->
  
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modalTitle">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php echo form_open_multipart('Emparejados/guardar_formulario', array('method'=>'POST')); ?>
                <!-- <form role="form" action="upload.php" method="post" enctype="multipart/form-data"> -->
            <div class="container">
              <div class="form-group ">
                <label for="respuesta">Pregunta:</label>
                <input class="form-control" id="pregunta" name="pregunta" type="text" value="" required />
              </div>
            </div>
          <div class="container">
              <div class="form-group ">
                <label for="respuesta">Respuesta:</label>
                <input class="form-control" id="respuesta" name="respuesta" type="text" value="" required/>         
            </div>
                    <div class="container">
            <div class="form-group ">
              <label for="pregunta">Imagen de la pregunta:</label>
              <div class="input-group">
                  <label class="input-group-btn">
                <span class="btn btn-primary btn-file">
                          Pregunta <input accept=".jpg,.png,.jpeg,.gif" class="hidden" name="img_pregunta" type="file" id="pregunta">
                      </span>
                  </label>
                  <input class="form-control" id="img_pregunta" readonly="readonly" name="img_pregunta" type="hidden" value="" />
              </div>

              </div> 
          </div>
          <div class="container">
            <div class="form-group ">
              <label for="respuesta">Imagen de la respuesta:</label>
              <div class="input-group">
                  <label class="input-group-btn">
                <span class="btn btn-primary btn-file">
                          Respuesta <input accept=".jpg,.png,.jpeg,.gif" class="hidden" name="img_respuesta" type="file" id="respuesta">
                      </span>
                  </label>
                  <input class="form-control"   id="img_respuesta" readonly="readonly" name="img_respuesta" type="hidden" value="" required/>

              </div>
              </div>  
            </div> 
          <button class="btn btn-primary" id="boton" type="submit">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>

</body>
</html>