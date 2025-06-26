
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>

    <link href="<?= base_url('assets/css/miestilo.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce6c7e6ad7.js" crossorigin="anonymous"></script>
    <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>" type="image/x-icon">
</head>
<body>
<nav class="navbar nav-admin navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('user_admin') ?>"><img src="<?= base_url('assets/img/logo.png') ?>" class="logo" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentAdmin" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse collapse-admin navbar-collapse" id="navbarSupportedContentA">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" aria-current="page" href="<?= base_url('ver_consultas') ?>">Ver consultas</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('ver_ventas') ?>">Lista de ventas</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('agregar') ?>">Agregar productos</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('gestionar') ?>">Gestionar productos</a>
        </li>
        <li class="nav-item mx-3 pl-3 ">
          <a class="nav-link boton-nav" href="<?= base_url('ver_usuarios') ?>">Visualizar usuarios</a>
        </li>
        <?php if (session('login')) { ?>
          <li class="nav-item mx-3 pl-3">
          <a class="nav-link boton-nav" href="#"><?php echo session('apellido');?></a>
        </li>
          <li class="nav-item mx-3 pl-3">
            <a class="nav-link boton-nav" href="<?= base_url('logout') ?>">Cerrar sesion</a>
          </li>
        <?php } else { ?>
          <li class="nav-item mx-3 pl-3">
            <a class="nav-link boton-nav" href="<?= base_url('registrarse') ?>">Registrarse</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>