<!DOCTYPE html>
<html lang="en">

<body>
<section>
    
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" ></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <?php echo '<img src="assets/img/carrousel_1.jpg" alt=""  class="imagenes-carrousel">';?>
    </div>
    <div class="carousel-item">
    <?php echo '<img src="assets/img/futbo_sala2-1920x500.jpg" alt=""  class="imagenes-carrousel">';?>
    </div>
    <div class="carousel-item">
    <?php echo '<img src="assets/img/sintetico.avif" alt="" class="imagenes-carrousel">';?>
    </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> 
</section>

<h1 class ="text-center mt-4 mb-0">Podes acceder a nuestros catalogos</h1>
<div class="row row-col-1 g-4 mt-4 cards">
  <div class="col">
    <div class="card w-70 h-100" >
    <?php echo '<img src="assets/img/botines.jpg" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Botines</h5>
        <p class="card-text">Vas a poder ver todo el catálogo de botines.</p>
      </div>
      <a href="botines" class="btn boton-card" >Hace click acá</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/camiseta2.jpg" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Camisetas</h5>
        <p class="card-text">Acá vas a encontrar las mejores camisetas del mercado. Hay varios tipos de camisetas, desde retros hasta las más actuales
        </p>
      </div>
      <a href="camisetas" class="btn boton-card" >Hace click acá</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/conos.jpg" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Indumentaria de entrenamiento</h5>
        <p class="card-text">Tambien contamos con accesorios para poder potenciar tu entrenamiento, como conos, escaleras y más cosas, entrá para mirar.</p>
      </div>
      <a href="entrenamiento" class="btn boton-card" >Hace click acá</a>
    </div>
  </div>
</div>

<div class="">
  <div class="banner">
    <?php echo '<img src="assets/img/camisetas2.jpg" alt="" class="">';?>
  </div>
</div>

<h1 class ="text-center mt-4 mb-0">Las camisetas más vendidas</h1>
<div class="row row-col-1 g-4 mt-4 cards">
  <div class="col">
    <div class="card w-70 h-100">
    <?php echo '<img src="assets/img/camisetamv1.webp" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Paris Saint Germain - 2021</h5>
        <p class="card-text">Primera camiseta de Messi fuera del Barcelona.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/camisetaarg.webp" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Selección Argentina - 1994</h5>
        <p class="card-text">Camiseta suplente que vistió la selección en el mundial de 1994.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/camisetabrasil.png" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Selección de Brasil - 2002</h5>
        <p class="card-text">Camiseta de la selección de Brasil en el mundial Corea-Japón 2002, donde salieron campeones.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
</div>

<h1 class ="text-center mt-4 mb-0">Camisetas Temporada 2024/2025</h1>
<div class="row row-col-1 g-4 mt-4 cards">
  <div class="col">
    <div class="card w-70 h-100">
    <?php echo '<img src="assets/img/boca25.png" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Boca Juniors</h5>
        <p class="card-text">La camiseta que viste el club esta temporada.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/city25.webp" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Manchester City</h5>
        <p class="card-text">La camiseta que viste el club esta temporada.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <?php echo '<img src="assets/img/united25.png" alt="" class="card-img-top">';?>
      <div class="card-body">
        <h5 class="card-title">Manchester United</h5>
        <p class="card-text">La camiseta que viste el club esta temporada.</p>
      </div>
      <a href="camisetas" class="btn boton-card" >Mirá todo el catálogo</a>
    </div>
  </div>
</div>
</body>
</html>