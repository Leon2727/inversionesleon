<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Inveriones Leon | Cambiar Password</title>
    <link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
  </head>
  <header>
  <?php $this->load->view("componentes/barra");?>
</header>
  <body class="bg-secondary text-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <br><center>
          <img src="<?php echo base_url("assets/img/logo.png"); ?>" class="card-img-top" alt="...">
         
          <h1>CAMBIAR PASSWORD</h1></center>
          <br>
          <form method="post">
            <div class="form-group">
           
            <center>   <input type="password" placeholder="NUEVO PASSWORD"class="form-control text-center" name="pass" ></center>
            </div>
            <div class="form-group">
           
            <center>  <input type="password"  placeholder="REPETIR PASSWORD" class="form-control text-center" name="passdenuevo"></center>
            </div>
            <center> <button type="submit" class="btn btn-dark">Guardar Cambio</button></center>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>