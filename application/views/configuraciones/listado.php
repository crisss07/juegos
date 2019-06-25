<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Formulario de Registro</title>

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
                Ap Materno
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
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="form-validation.css" rel="stylesheet"> -->
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="col-12" align="center">USUARIOS REGISTRADOS</h1>
                <div style="height: 60px;" class="col-lg-4 col-md-2">
                    <button style="margin: auto;" type="button" class="btn btn-success btn-lg" data-toggle="modal" onclick="nueva_persona();">Nueva persona</button>
                </div>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>CI</th>
                            <th>Ciudad</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <!-- <th>Estado</th> -->
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <?php $var = 1; ?>
                    <tbody>
                        <?php foreach ($personas as $p) : ?>
                            <?php
                            $datos = $p->id . "||" .
                                $p->perfil . "||" .
                                $p->nombres . "||" .
                                $p->ap . "||" .
                                $p->am . "||" .
                                $p->ci . "||" .
                                $p->fecha_nacimiento . "||" .
                                $p->ciudad . "||" .
                                $p->email . "||" .
                                $p->celular . "||" .
                                $p->estado;
                            // echo $datos;
                            ?>
                            <tr>
                                <td><?php echo $var++; ?></td>
                                <td><?php echo $p->nombres; ?> <?php echo $p->ap; ?> <?php echo $p->am; ?></td>
                                <td><?php echo $p->ci; ?></td>
                                <td>
                                    <?php echo $p->ciudad; ?>
                                </td>
                                <td><?php echo $p->email; ?></td>
                                <td><?php echo $p->celular; ?></td>
                                <!-- <td><?php
                                            ?></td> -->
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_edit" onclick="agregarform('<?php echo $datos ?>')">Editar</button>
                                    <a id="button" type="button" class="btn btn-danger" onclick='if (window.confirm(" Do you really want to leave?")) { window.location("<?php echo base_url("/configuraciones/elimina_usuario/$p->id"); ?>"); }'>Eliminar</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>

            <!-- Modal Edicion-->
            <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form class="needs-validation" action="<?php echo base_url('/configuraciones/guarda_registro/') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Nombres</label>
                                            <input type="hidden" id="persona_id" value="" name="id">
                                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ej: Faviana Lucia" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="lastName">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="ap" id="ap" placeholder="Ej: Herrera" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="lastName">Apellido Materno</label>
                                            <input type="text" class="form-control" name="am" id="am" placeholder="Ej: Vega" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="address">Carnet</label>
                                            <input type="number" class="form-control" name="ci" id="ci" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="address">Fecha nacimiento</label>
                                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="country">Ciudad</label>
                                            <select class="custom-select d-block w-100" name="ciudad" id="ciudad" required>
                                                <option value="La Paz">La Paz</option>
                                                <option value="Cochabamba">Cochabamba</option>
                                                <option value="Santa Cruz">Santa Cruz</option>
                                                <option value="Sucre">Sucre</option>
                                                <option value="Potosi">Potosi</option>
                                                <option value="Oruro">Oruro</option>
                                                <option value="Tarija">Tarija</option>
                                                <option value="Pando">Pando</option>
                                                <option value="Trinidad">Trinidad</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label for="cc-name">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Ej: tucorreo@gmail.com" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="cc-number">Celular</label>
                                            <input type="text" class="form-control" name="celular" id="celular" placeholder="Ej: 735124789" required>
                                        </div>
                                    </div>

                                    <hr class="mb-4">
                                    <button class="btn btn-warning btn-lg btn-block" type="submit">REGISTRARME</button>
                                </form>
                            </div>
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

        function agregarform(datos) {
            
            d = datos.split('||');
            // console.log(d);
            $('#persona_id').val(d[0]);
            $('#nombres').val(d[2]);
            $('#ap').val(d[3]);
            $('#am').val(d[4]);
            $('#ci').val(d[5]);
            $('#fecha_nacimiento').val(d[6]);
            $('#ciudad').val(d[7]);
            $('#email').val(d[8]);
            $('#celular').val(d[9]);
        }

        function nueva_persona() {

            $('#persona_id').val("");
            $('#nombres').val("");
            $('#ap').val("");
            $('#am').val("");
            $('#ci').val("");
            $('#fecha_nacimiento').val("");
            $('#ciudad').val("");
            $('#email').val("");
            $('#celular').val("");

            $("#Modal_edit").modal('show');
            // console.log("Hizo click");
        }
    </script>
</body>

</html>