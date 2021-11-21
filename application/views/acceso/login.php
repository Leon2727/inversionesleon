<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Inversiones Leon | Login</title>
    <link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
    
  </head>
  <body class="bg-secondary">
    <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <br>
              <div class="card bg-dark text-light">
              <img src="<?php echo base_url("assets/img/logo.png"); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center">INGRESO AL SISTEMA</h5>
                <?php // echo validation_errors(); ?>
                <?php
                  if(isset($OP)){
                    switch($OP){
                      case "MAL":
                        ?>
                          <div class="alert alert-danger" role="alert">
                            Complete los datos del formulario
                          </div>
                        <?php
                        break;
                      
                      case "INCORRECTO":
                          ?>
                            <div class="alert alert-danger" role="alert">
                              Usuario o Pass incorrecta
                            </div>
                          <?php
                          break;
  
                    }

                  }
                ?>
                <form method="post">
                  <div class="form-group">
                  <center>
                    
                   
                    <input type="text" placeholder="USUARIO" class="form-control text-strong text-center" name="usuario" value=""> </center>
                    <?php echo form_error('usuario', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                  <center>
                    
                    <input type="password" placeholder="PASSWORD" class="form-control text-center" name="password"></center>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <center>

                  
                  <button type="submit" class="btn btn-secondary" name="ingresar">INGRESAR</button></center>
                </form>
                <center>
                    
                 
                <a class="button text-light" href="<?php echo site_url("auth/usuarionuevo"); ?>">REGISTRARSE</a> </center>
              </div>
            </div>
          </div>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>