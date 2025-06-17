<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio"><?php echo '<img src="assets/img/logo.png" class ="logo";>'?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav active" aria-current="page" href="inicio">Inicio</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('nosotros') ?>">Nosotros</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('comercializacion') ?>">Comercialización</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('catalogo') ?>">Catálogo</a>
        </li>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="<?= base_url('contacto') ?>">Contacto</a>
        </li>
        <?php if(session('login')){?>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="<?= base_url('ver_carrito') ?>">Ver carrito</a>
        </li>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="#"><?php echo session('apellido');?></a>
        </li>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="<?= base_url('logout') ?>">Cerrar sesion</a>
        </li>
        <?php } else { ?>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="<?= base_url('inicio_sesion') ?>">Iniciar sesion</a>
        </li>
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="<?= base_url('registrarse') ?>">Registrarse</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
