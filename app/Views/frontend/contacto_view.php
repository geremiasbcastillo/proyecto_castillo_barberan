<?php helper('form'); ?>
<h1 class="text-center mt-5">Contacto</h1>
<!-- <h4 class="text-center">Acá te dejamos un formulario para dejarnos tu consulta.</h4> -->
<div class="container contenedor-contacto">
    <div class="row row-cols-1 row-cols-sm-2 ">
        <div class="col">
            <div>
                <h2 class ="text-center">Datos de contacto</h2>
                <div class="info-contacto" style="margin-top: 50px">
                <p>Teléfono: 3794-437486</p>
                <p>Correo: correodecontacto@gmail.com</p>
                <p>Direccion 9 de julio 1449</p>
                <p>Corrientes - Argentina</p>
                </div>

            </div>
        </div>
        <div class="col">
            <h2>Contactenos</h2>
            <div class="formulario mt-0 ">
                <?php if(!empty($validation)):?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach($validation as $error):?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if (session('mensaje_consulta')){
                    echo session('mensaje_consulta');
                } ?>
                    <?php echo form_open('usuarios_controller::add_consulta', ['class' => 'formulario']); ?> 
                    <!--<form action="" namespace='usuarios_controller::add_consulta' method="post" class="formulario">-->
                        <div class="mb-2 formulario-label">
                            <label for="nombre" class="form-label">Ingrese su nombre:</label>
                            <input type="text" minlength="3" class="form-control" name="nombre" value="" maxlength="20" placeholder="Juan Gomez">
                        </div>
                        <div class="mb-2 formulario-label">
                            <label for="telefono" class="form-label">Ingrese su teléfono:</label>
                            <input type="number" class="form-control" name="telefono" value="" maxlength="15" placeholder="3795-150953" >
                        </div>
                        <div class="mb-2 formulario-label">
                            <label for="mail" class="form-label">Ingrese su correo:</label>
                            <input type="email" name="mail" class="form-control" placeholder="benjamincastillo@gmail.com" >
                        </div>
                        <div class="mb-2 formulario-label">
                            <label for="consulta" class="form-label">Deje su consulta aquí:</label>
                            <textarea class="form-control" name="consulta" rows="3" placeholder="Consulta..."></textarea>
                        </div>
                        <button type="submit" class="btn boton-form">Enviar</button>
                    <?php echo form_close(); ?>
                </div>
        </div>
    </div>
    
    <div class="mapa justify-content-center mt-3" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2976.8377402261845!2d-58.83345135296287!3d-27.466873881036644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d0e7a999%3A0x3efbeb84abc975f9!2s9%20de%20Julio%201449%2C%20W3400AZB%20Corrientes!5e0!3m2!1ses!2sar!4v1745027947500!5m2!1ses!2sar" 
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>