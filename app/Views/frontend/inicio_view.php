<main>
    <div class="container-fluid">
        <div class="imagen-inicio">
            <?php echo '<img src="assets/img/imagen_principal.png" class="imagen-inicio" alt="">'; ?>
        </div>
         <section class="py-5">
            <div class="container">
                <h2 class="text-left mb-4">CAMISETAS</h2>

                <div class="carousel-wrapper position-relative">
                    <button class="btn-carousel prev" onclick="scrollCarruselNike('left')">&#10094;</button>

                    <div class="carousel-container" id="carousel-nike">

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/argentina86.png" class="card-img-top" alt="Camiseta 1">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Camiseta Argentina '86</h5>
                                    <p class="card-text">$89.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/realmadrid25.png" class="card-img-top" alt="Camiseta 2">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Camiseta Real Madrid '25</h5>
                                    <p class="card-text">$110.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/barcelona24.png" class="card-img-top" alt="Camiseta 3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Camiseta Barcelona '24</h5>
                                    <p class="card-text">$167.500</p>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/internazionale07.png" class="card-img-top" alt="Camiseta 4">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Camiseta Internazionale '07</h5>
                                    <p class="card-text">$80.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/boca25.png" class="card-img-top" alt="Camiseta 5">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Camiseta Boca Juniors '25</h5>
                                    <p class="card-text">$138.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark target">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/leeds78.png" class="card-img-top" alt="Camiseta 6">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Leeds United '78</h5>
                                    <p class="card-text">$65.500</p>
                                </div>
                            </div>
                        </a>

                    </div>

                    <button class="btn-carousel next" onclick="scrollCarruselNike('right')">&#10095;</button>
                </div>

            </div>
        </section>
        <div class="container mb-4">
            <section class="seccion-inspiradora">
                <div class="contenido-inspirador text-center">
                    <h2>Viví el fútbol con pasión</h2>
                    <p>Jugá con lo mejor</p>
                </div>
            </section>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php echo '<img src="assets/img/imagen_car_1.jpg" class="d-block w-100" alt="">'; ?>
                    </div>
                    <div class="carousel-item">
                        <?php echo '<img src="assets/img/imagen_car_2.png" class="d-block w-100" alt="">'; ?>
                    </div>
                    <div class="carousel-item">
                        <?php echo '<img src="assets/img/imagen_car_3.png" class="d-block w-100" alt="">'; ?>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <section class="py-5">
            <div class="container">
                <h2 class="text-left mb-4">BOTINES</h2>

                <div class="carousel-wrapper position-relative">
                    <button class="btn-carousel prev" onclick="scrollCarruselNike('left')">&#10094;</button>

                    <div class="carousel-container" id="carousel-nike">

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/nikephantom.jpg" class="card-img-top" alt="Botín 1">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nike Phantom GX</h5>
                                    <p class="card-text">$119.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/pumaborussia.png" class="card-img-top" alt="Botín 2">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Puma Borussia</h5>
                                    <p class="card-text">$125.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/nikemercurial.jpg" class="card-img-top" alt="Botín 3">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nike Mercurial Superfly</h5>
                                    <p class="card-text">$132.500</p>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/adidaspredator.png" class="card-img-top" alt="Botín 4">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Adidas Predator</h5>
                                    <p class="card-text">$115.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/adidasf50.png" class="card-img-top" alt="Botín 5">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Adidas F50</h5>
                                    <p class="card-text">$128.000</p>
                                </div>
                            </div>
                        </a>

                        <a href="<?= base_url('/catalogo') ?>" target="blank" class="text-decoration-none text-dark target">
                            <div class="card mx-2 producto-card">
                                <img src="assets/img/topper.png" class="card-img-top" alt="Botín 6">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Topper San Siro</h5>
                                    <p class="card-text">$109.500</p>
                                </div>
                            </div>
                        </a>

                    </div>

                    <button class="btn-carousel next" onclick="scrollCarruselNike('right')">&#10095;</button>
                </div>

            </div>
        </section>
        <script>
  function scrollCarruselNike(direction) {
    const container = document.getElementById('carousel-nike');
    const scrollAmount = 300;
    if (direction === 'left') {
      container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
  }
</script>
    </div>
</main>