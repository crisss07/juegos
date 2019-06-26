<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Juegos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        .titulo {
            font-family: 'Luckiest Guy', cursive;
            /*font-size: 50px;*/
            /*color: #ff0000;*/
            color: #f4bb41;
            /*font-family: "Kanit";*/
            font-size: 72px;
            line-height: 1em;
            margin: 0;
            /*position: absolute;*/
            text-align: center;
            top: 50%;
            /*transform: translateY(-50%);*/
            /*width: 100%;*/
            text-shadow: .1em .1em .2em rgba(0, 0, 0, 0.6);
        }

        .contenidos {
            font-family: 'Handlee', cursive;
            font-size: 28px;
            color: #ffffff;
            font-weight: bolder;
        }

        #txt_tutorial {
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: +1;
            /*background: #ff0000;*/
        }

        .cabecera {
            /*background:url("http://localhost/juegos/public/img/fnd.jpg") no-repeat !important;*/
            /*padding-top:100px;*/
            /*background-size:cover;*/
            /*height: 100%;*/
            /*background-position: center;*/
            /*background-repeat: no-repeat;*/
            /*background-size: cover;*/
            /*font-family: 'Orbitron', sans-serif;*/
            background: url("<?php echo base_url('public/img/fp1.jpeg') ?>") no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .botones {

            text-align: center;
            top: 50%;
            /*transform: translateY(-50%);*/
            /*width: 100%;*/

            padding-bottom: 50px;
        }
    </style>
</head>

<body>

    <div class="jumbotron text-center cabecera">
        <h1 class="titulo">ADMINISTRACION</h1>
        <p class="contenidos">Bienvenido a nuestra consola de juegos!</p>
        <!-- <i class="material-icons">face</i> -->
    </div>
    <div class="container botones">
        <a href="<?php echo base_url('/configuraciones/inicio') ?>" class="btn btn-info">Inicio</a>
        <a href="<?php echo base_url('/configuraciones/listado') ?>" class="btn btn-warning">Listado registrados</a>
        <a href="<?php echo base_url('/entrega') ?>" class="btn btn-success">Entrega permios</a>
        <a href="<?php echo base_url('/entrega/premiados') ?>" class="btn btn-danger">Premios recogidos</a>
<!--         <a href="#" class="btn btn-success">Ranking</a>
        <a href="#" class="btn btn-primary">Ranking personal</a>
 -->    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo base_url('/public/img/ahorcado.jpg'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">EL AHORCADO</h5>
                        <p class="card-text">
                            Accede a la adminsitracion del juego
                        </p>
                        <a href="<?php echo base_url('/ahorcado/listado') ?>" class="btn btn-info">COMENZAR A JUGAR</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo base_url('/public/img/sopa.jpg'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">SOPA DE LETRAS</h5>
                        <p class="card-text">
                            Accede a la adminsitracion del juego
                        </p>
                        <a href="<?php echo base_url('/sopa/listado_preguntas') ?>" class="btn btn-warning">ADMINISTRAR</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo base_url('/public/img/trivia.jpg'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">TRIVIA</h5>
                        <p class="card-text">
                            Accede a la adminsitracion del juego
                        </p>
                        <a href="<?php echo base_url('/Trivia/formulario') ?>" class="btn btn-warning">PREGUNTAS</a>
                        <br>
                        <a href="<?php echo base_url('/Trivia/sabias') ?>" class="btn btn-warning" style="margin-top: 5%;">¿SABIAS QUÉ?</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo base_url('/public/img/emparejados.jpg'); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">EMPAREJADOS</h5>
                        <p class="card-text">
                            Accede a la adminsitracion del juego.
                        </p>
                        <a href="<?php echo base_url('/Emparejados/formulario') ?>" class="btn btn-primary" disabled>ADMINISTRAR</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>