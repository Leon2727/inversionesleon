<nav class="navbar navbar-expand navbar-light text-light bg-dark">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link  text-light bg-dark" href="<?php echo site_url("auth/principal"); ?>"><i class="bi bi-bank text-danger"></i> INVERSIONES LEON <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link  text-light bg-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-person-fill"></i> <?php echo strtoupper($usuario_logueado); ?>
        </a>
        <div class="dropdown-menu   text-light bg-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item  text-light bg-dark" href="<?php echo site_url("main/inversiones"); ?>">MIS INVERSIONES</a>
          <div class="dropdown-divider  text-light bg-dark"></div>
          <a class="dropdown-item  text-light bg-dark" href="<?php echo site_url("main/nuevainversion"); ?>">NUEVA INVERSION</a>
          <div class="dropdown-divider  text-light bg-dark"></div>
          <a class="dropdown-item  text-light bg-dark" href="<?php echo site_url("main/cambiarpass"); ?>">CAMBIAR PASSWORD</a>
          <div class="dropdown-divider  text-light bg-dark"></div>
          <a class="dropdown-item  text-light bg-dark" href="<?php echo site_url("auth/salir"); ?>">LOGOUT</a>
     
          
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>