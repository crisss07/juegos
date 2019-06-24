
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


<!-- <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


    <style>
      body {
          background: url("<?php echo base_url("/public/img/fnd_nsopa.jpeg"); ?>") repeat; 
          color: #ffffff;
        } 
        .titulo{
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
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <!-- <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <h2 class="titulo">Formulario de Registro</h2>
    <!-- <p class="lead">Completa el siguiente formulario con tus datos personales</p> -->
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span style="color: #f4bb41">Aviso</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <small class="text-muted">
              El presente registro de usuario
              premite participar en los juegos 
              con los que podras ganar boligrafos,
              power banks, flash memories, celulares,
              tablets y muchos mas..
            </small>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <form class="needs-validation" action="<?php echo base_url('/configuraciones/guarda_registro/') ?>" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombres</label>
            <input type="text" class="form-control" name="nombres" placeholder="Ej: Faviana Lucia" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Apellido Paterno</label>
            <input type="text" class="form-control" name="ap" placeholder="Ej: Herrera" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Apellido Materno</label>
            <input type="text" class="form-control" name="am" placeholder="Ej: Vega" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="address">Carnet</label>
            <input type="number" class="form-control" name="ci" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="address">Fecha nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="country">Ciudad</label>
            <select class="custom-select d-block w-100" name="ciudad" required>
              <option value="lp">La Paz</option>
              <option value="cbba">Cochabamba</option>
              <option value="scz">Santa Cruz</option>
              <option value="sc">Sucre</option>
              <option value="pt">Potosi</option>
              <option value="or">Oruro</option>
              <option value="tr">Tarija</option>
              <option value="pd">Pando</option>
              <option value="tn">Trinidad</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8 mb-3">
            <label for="cc-name">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Ej: tucorreo@gmail.com" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="cc-number">Celular</label>
            <input type="text" class="form-control" name="celular" placeholder="Ej: 735124789" required>
          </div>
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-warning btn-lg btn-block" type="submit">REGISTRARME</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 VMVU</p>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>
