<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua.compatible" content="ie-edge">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <style type="text/css">

        body{
            background: url("<?php echo base_url("/public/img/fnd_nsopa.jpeg"); ?>");
        }
        
        th{
            font-family: fantasy;
            font-size: 20px;
            text-align: center;
        }

        td{
            font-size: 15px;
        }

        #button {
            font-size: 15px;
        }

        table{
            background-color: #F7F7F7;
        }
       

    </style>

    <title>preguntas</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h1 class="col-12" align="center">PREGUNTAS DE LA TRIVIA</h1>
            
          <table id="myTable" class="table table-striped table-bordered col-12">
            <div style="height: 60px;" class="col-lg-4 col-md-2" >
                <button style="margin: auto;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#Modal_insert">Nueva Pregunta</button>
            </div>
            <thead>
                <tr>
                    <th></th>
                    <th>Pregunta</th>
                    <th>Respuesta 1</th>
                    <th>Respuesta 2</th>
                    <th>Respuesta 3</th>
                    <th>Respuesta Correcta</th>
                    <th>Acci&oacute;n</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <?php $var = 1; ?>
            <tbody>

                <?php foreach($triviaa as $tri){
                             $datos = $tri->id."||".
                                     $tri->pregunta."||".
                                     $tri->respuesta_uno."||".
                                     $tri->respuesta_dos."||".
                                     $tri->respuesta_tres."||".
                                     $tri->respuesta_correcta;
                        ?>
                <tr>
                    <td><?php echo $var++; ?></td>
                    <td><?php echo $tri->pregunta; ?></td>
                    <td><?php echo $tri->respuesta_uno; ?></td>
                    <td><?php echo $tri->respuesta_dos; ?></td>
                    <td><?php echo $tri->respuesta_tres; ?></td>
                    <td><?php echo $tri->respuesta_correcta; ?></td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_edit" onclick="agregarform('<?php echo $datos ?>')">Editar</button>
                    <td><a id="button" type="button" class="btn btn-danger" href="<?= base_url('trivia/eliminar/'. $tri->id); ?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>

        

              <!-- Modal Edicion-->
        <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Pregunta</h5>
              </div>
              <div class="modal-body">
                    <!--<form action="<?php echo base_url();?>edificio/update" method="POST">-->
                    <?php echo form_open('trivia/update', array('method'=>'POST')); ?>
                        <div class="form-group">
                            <input type="text" hidden="" id="id" name="id">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Pregunta</label>
                            <textarea class="form-control" id="pregunta" name="pregunta" value="<?php echo $tri->pregunta;?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 1</label>
                            <input type="text" class="form-control" id="respuesta_uno" name="respuesta_uno" value="<?php echo $tri->respuesta_uno;?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 2</label>
                            <input type="text" class="form-control" id="respuesta_dos" name="respuesta_dos" value="<?php echo $tri->respuesta_dos;?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 3</label>
                            <input type="text" class="form-control" id="respuesta_tres" name="respuesta_tres" value="<?php echo $tri->respuesta_tres;?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta Correcta</label>
                            <input type="integer" class="form-control" id="respuesta_correcta" name="respuesta_correcta" value="<?php echo $tri->respuesta_correcta;?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>

              <!-- Modal Insercion-->
        <div class="modal fade" id="Modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preguntas</h5>
              </div>
              <div class="modal-body">
                    <!--<form action="<?php echo base_url();?>edificio/update" method="POST">-->
                    <?php echo form_open('trivia/insertar', array('method'=>'POST')); ?>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Pregunta</label>
                            <textarea class="form-control" id="pregunta" name="pregunta"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 1</label>
                            <input type="text" class="form-control" id="respuesta_uno" name="respuesta_uno">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 2</label>
                            <input type="text" class="form-control" id="respuesta_dos" name="respuesta_dos">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta 3</label>
                            <input type="text" class="form-control" id="respuesta_tres" name="respuesta_tres">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Respuesta Correcta</label>
                            <input type="integer" class="form-control" id="respuesta_correcta" name="respuesta_correcta">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
       


      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>public/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>}
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
         $(document).ready( function () {
            $('#myTable').DataTable({
                 "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - lo siento",
                    "info": "Mostrando la página _PAGINA_ de _PAGINES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate":{
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior", 
                    },
                 }
            });
        } );
    </script>

    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
             $('#id').val(d[0]);
              $('#pregunta').val(d[1]);
              $('#respuesta_uno').val(d[2]);
              $('#respuesta_dos').val(d[3]);
              $('#respuesta_tres').val(d[4]);
              $('#respuesta_correcta').val(d[5]);
        }
    </script>
  </body>
</html>