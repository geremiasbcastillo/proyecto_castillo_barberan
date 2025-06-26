<main>
    <div class="container-fluid">
        <div class="imagen-inicio">
            <?php echo '<img src="assets/img/imagen_principal.png" class="imagen-inicio" alt="">'; ?>
        </div>
        <section class="py-5">
            <div class="container">
                <h2 class="text-left mb-4">CAMISETAS</h2>

                <div class="carousel-wrapper position-relative">
                    <button class="btn-carousel prev" onclick="scrollCarruselCamiseta('left')">&#10094;</button>

                    <div class="carousel-container" id="carousel-camisetas">
                        <?php
                        $max = min(5, count($camisetas));
                        for ($i = 0; $i < $max; $i++): 
                            $camiseta = $camisetas[$i];
                        ?>
                            <a href="<?= base_url('catalogo?categoria=' . $camiseta['producto_categoria']) ?>" target="_blank" class="text-decoration-none text-dark">
                                <div class="card mx-2 producto-card">
                                    <img src="<?= base_url('public/assets/upload/' . $camiseta['producto_imagen']) ?>" class="card-img-top" alt="<?= esc($camiseta['producto_nombre']) ?>">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= esc($camiseta['producto_nombre']) ?></h5>
                                        <p class="card-text">$<?= number_format($camiseta['producto_precio'], 0, ',', '.') ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endfor; ?>
                    </div>
                    <button class="btn-carousel next" onclick="scrollCarruselCamiseta('right')">&#10095;</button>
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
                    <button class="btn-carousel prev" onclick="scrollCarruselBotines('left')">&#10094;</button>

                    <div class="carousel-container" id="carousel-botines">

                        <?php
                        $max = min(5, count($botines));
                        for ($i = 0; $i < $max; $i++): 
                            $botin = $botines[$i];
                        ?>
                            <a href="<?= base_url('catalogo?categoria=' . $botin['producto_categoria']) ?>" target="_blank" class="text-decoration-none text-dark">
                                <div class="card mx-2 producto-card">
                                    <img src="<?= base_url('public/assets/upload/' . $botin['producto_imagen']) ?>" class="card-img-top" alt="<?= esc($botin['producto_nombre']) ?>">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= esc($botin['producto_nombre']) ?></h5>
                                        <p class="card-text">$<?= number_format($botin['producto_precio'], 0, ',', '.') ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endfor; ?>

                    </div>

                    <button class="btn-carousel next" onclick="scrollCarruselBotines('right')">&#10095;</button>
                </div>
            </div>
        </section>
        
        <section class="py-5">
            <div class="container">
                <h2 class="text-left mb-4">ENTRENAMIENTO</h2>

                <div class="carousel-wrapper position-relative">
                    <button class="btn-carousel prev" onclick="scrollCarruselEntrenamiento('left')">&#10094;</button>

                    <div class="carousel-container" id="carousel-entrenamiento">

                        <?php
                        $max = min(5, count($entrenamiento));
                        for ($i = 0; $i < $max; $i++): 
                            $entreno = $entrenamiento[$i];
                        ?>
                            <a href="<?= base_url('catalogo?categoria=' . $entreno['producto_categoria']) ?>" target="_blank" class="text-decoration-none text-dark">
                                <div class="card mx-2 producto-card">
                                    <img src="<?= base_url('public/assets/upload/' . $entreno['producto_imagen']) ?>" class="card-img-top" alt="<?= esc($botin['producto_nombre']) ?>">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= esc($entreno['producto_nombre']) ?></h5>
                                        <p class="card-text">$<?= number_format($entreno['producto_precio'], 0, ',', '.') ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endfor; ?>

                    </div>

                    <button class="btn-carousel next" onclick="scrollCarruselEntrenamiento('right')">&#10095;</button>
                </div>
            </div>
        </section>

        <script>
            function scrollCarruselBotines(direction) {
                const container = document.getElementById('carousel-botines');
                const scrollAmount = 300;
                if (direction === 'left') {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                } else {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }
            function scrollCarruselCamiseta(direction) {
                const container = document.getElementById('carousel-camisetas');
                const scrollAmount = 300;
                if (direction === 'left') {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                } else {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }
            function scrollCarruselEntrenamiento(direction) {
                const container = document.getElementById('carousel-entrenamiento');
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