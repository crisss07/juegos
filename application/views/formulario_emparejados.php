<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Listado preguntas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


    <style>
        body {
            background: url("<?php echo base_url("/public/img/fnd_nsopa.jpeg"); ?>") repeat;
            color: #000000;
        }

        .titulo {
            font-family: 'Luckiest Guy', cursive;
            /*font-size: 50px;*/
            /*color: #ff0000;*/
            color: #f4bb41;
            /*font-family: "Kanit";*/
            font-size: 42px;
            line-height: 1em;
            margin: 0;
            /*position: absolute;*/
            text-align: center;
            top: 50%;
            /*transform: translateY(-50%);*/
            /*width: 100%;*/
            /*text-shadow: 0 1px 0 #e4adad, 0 2px 0 #e1a6a6, 0 3px 0 #df9e9e, 0 4px 0 #dc9696, 0 5px 0 #da8f8f, 0 6px 0 #d78787, 0 7px 0 #d58080, 0 8px 0 #d27878, 0 0 5px rgba(237, 154, 154, 0.05), 0 -1px 3px rgba(237, 154, 154, 0.2), 0 9px 9px rgba(237, 154, 154, 0.5), 0 12px 12px rgba(237, 154, 154, 0.5), 0 15px 15px rgba(237, 154, 154, 0.5);*/
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
                
            }
        }

        th {
            /* font-family: fantasy; */
            font-size: 20px;
            text-align: center;
        }

        td {
            font-size: 15px;
        }

        #button {
            font-size: 15px;
        }

        table {
            background-color: #F7F7F7;
        }
        .recortar{
          height: 100px;
          width: 100px;
        }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet"> -->
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="col-12" align="center">LISTADO PREGUNTAS</h1>
                <div style="height: 60px;" class="col-lg-4 col-md-2">
                    <button style="margin: auto;" type="button" class="btn btn-success btn-lg" data-toggle="modal" onclick="mostrarModal('Crear pregunta', ' ', ' ', ' ', ' ')">Nueva pregunta</button>
                </div>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pregunta</th>
                            <th>Imagen de la pregunta</th>
                            <th>Respuesta</th>
                            <th>Imagen de la respuesta</th>
                            <th>Acci&oacute;n</th>
                            <th>Acci&oacute;n</th>

                        </tr>
                    </thead>
                    <?php $var = 1; ?>
                    <tbody>
                        <?php foreach ($emparejados as $datos) : ?>
                            
                            <tr>
                                <td><?php echo $var++; ?></td>
                                <td><?php echo $datos->pregunta ?></td>
                                <td><img class="recortar" src="<?php echo base_url(); ?>public/img_emparejados/<?php echo $datos->img_pregunta ?>"></td>
                                <td><?php echo $datos->respuesta  ?></td>
                                <td><img class="recortar" src="<?php echo base_url(); ?>public/img_emparejados/<?php echo $datos->img_respuesta ?>"></td>
                                <td>
                                  
                                    <button type="button" class="btn btn-warning" onclick="mostrarModal('Editar pregunta', <?php echo $datos->id ?>  ,'<?php echo $datos->pregunta ?>', '<?php echo $datos->respuesta  ?>', '',  '')" >Editar</button>
                                    
        
                                </td>
                                <td>
                                    <a id="button" onclick='if (window.confirm("Quieres eliminar esta pregunta?")) { window.location.href = "<?php echo base_url(); ?>/Emparejados/eliminar/<?php echo $datos->id ?>"; }' class="btn btn-danger" >Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div style="height: 60px;" class="col-lg-12 col-md-12">
                    <a href="<?php echo base_url('/configuraciones/inicio'); ?>" class="btn btn-primary btn-lg">MENU PRINCIPAL</a>
                </div>

            </div>

            <!-- Modal Edicion-->
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
            <input type="hidden" name="id" id="id">
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // alert('Si cargo');
            $('#example').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });

        function mostrarModal(titulo, id, pregunta, respuesta, img_pregunta, img_respuesta) {
        $("#modalTitle").html(titulo);
        $("#myModal").modal("show");
        $("#id").val(id);
        $("#pregunta").val(pregunta);
        $("#respuesta").val(respuesta);
        
      }

    </script>
</body>

</html>