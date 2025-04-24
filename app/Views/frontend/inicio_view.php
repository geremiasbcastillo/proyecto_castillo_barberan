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

<div class="row row-cols-1 row-cols-md-2 g-4 mt-4 cards">
  <div class="col">
    <div class="card w-70 h-100">
      <img src="assets/img/botines.jpg" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Botines</h5>
        <p class="card-text">Vas a poder ver todo el catálogo de botines.</p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="assets/img/camiseta2.jpg" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">Camisetas</h5>
        <p class="card-text">Acá vas a encontrar las mejores camisetas del mercado. Hay varios tipos de camisetas, desde retros hasta las más actuales
        </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="assets/img/conos.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Indumentaria de entrenamiento</h5>
        <p class="card-text">Tambien contamos con accesorios para poder potenciar tu entrenamiento, como conos, escaleras y más cosas, entrá para mirar.</p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
</div>
</body>
</html>