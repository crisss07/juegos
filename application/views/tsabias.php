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

    <title>Sabias</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h1 class="col-12" align="center">¿SABIAS QUÉ? TRIVIA</h1>
            
          <table id="myTable" class="table table-striped table-bordered col-12">
            <div style="height: 60px;" class="col-lg-4 col-md-2" >
                <button style="margin: auto;" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#Modal_insert">Nuevo</button>
            </div>
            <thead>
                <tr>
                    <th></th>
                    <th>¿Sabias qué?</th>
                    <th>Acci&oacute;n</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <?php $var = 1; ?>
            <tbody>

                <?php foreach($sabias as $sab){
                             $dato = $sab->id."||".
                                     $sab->nombre;
                        ?>
                <tr>
                    <td><?php echo $var++; ?></td>
                    <td><?php echo $sab->nombre; ?></td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_edit" onclick="agregarform('<?php echo $dato ?>')">Editar</button>
                    <td><a id="button" type="button" class="btn btn-danger" href="<?= base_url('trivia/eliminar_sabias/'. $sab->id); ?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
          <div style="height: 60px;" class="col-lg-12 col-md-12">
            <a href="<?php echo base_url('/configuraciones/inicio'); ?>" class="btn btn-primary btn-lg">MENU PRINCIPAL</a>
          </div>
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
                    <?php echo form_open('trivia/update_sabias', array('method'=>'POST')); ?>
                        <div class="form-group">
                            <input type="text" hidden="" id="id" name="id">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">¿Sabias qué?</label>
                            <textarea class="form-control" id="nombre" name="nombre" value="<?php echo $sab->nombre;?>"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">¿Sabias qué?</h5>
              </div>
              <div class="modal-body">
                    <!--<form action="<?php echo base_url();?>edificio/update" method="POST">-->
                    <?php echo form_open('trivia/insertar_sabias', array('method'=>'POST')); ?>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Sabias</label>
                            <textarea class="form-control" id="nombre" name="nombre"></textarea>
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
        function agregarform(dato)
        {
             d=dato.split('||');
             $('#id').val(d[0]);
              $('#nombre').val(d[1]);
             
        }
    </script>
  </body>
</html>