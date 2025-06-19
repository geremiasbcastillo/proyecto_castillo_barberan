<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $titulo; ?></title>

  <link href="<?= base_url('assets/css/miestilo.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ce6c7e6ad7.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="icon" href="<?= base_url('assets/img/logo.png'); ?>" type="image/x-icon">
</head>

<body>
  <nav class="navbar nav-principal navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="inicio"><?php echo '<img src="assets/img/logo.png" class ="logo";>' ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse collapse-principal navbar-collapse" id="navbarSupportedContent">
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
          <?php if (session('login')) { ?>
            <li class="nav-item mx-3 pl-3">
              <a class="nav-link boton-nav" href="<?= base_url('ver_carrito') ?>">Ver carrito</a>
            </li>
            <li class="nav-item mx-3 pl-3">
              <a class="nav-link boton-nav" href="<?= base_url('perfil') ?>"><?php echo session('apellido'); ?></a>
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