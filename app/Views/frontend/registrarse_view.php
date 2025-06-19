<main>
    <?php helper('form'); ?>
    <?php if (!session()->has('mensaje_registro'))
        session(); ?>

    <?php if (!empty($validation)): ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>

    <?php if (session('mensaje_registro')) {
        echo session('mensaje_registro');
    } ?>

    <?php echo form_open('registro_usuario', ['class' => 'formularios']) ?>

    <h2>Registrarse</h2>
    <div class="form-input">
        <label for="apellidos"> Apellido
            <?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos', 'type' => 'text', 'placeholder' => 'Barberan']); ?>
        </label>
    </div>
    <div class="form-input">
        <label for="nombres"> Nombre
            <?php echo form_input(['name' => 'nombres', 'id' => 'nombres', 'type' => 'text', 'placeholder' => 'Andres']); ?>
        </label>
    </div>
    <div class="form-input">
        <label for="correo"> Dirección de correo electrónico
            <?php echo form_input(['name' => 'correo', 'id' => 'correo', 'type' => 'text', 'placeholder' => 'correo123@gmail.com']); ?>
        </label>
    </div>
    <div class="form-input">
        <label for="contrasena"> Contraseña
            <?php echo form_input(['name' => 'contrasena', 'id' => 'contrasena', 'type' => 'password', 'placeholder' => '••••••••']); ?>
        </label>
    </div>
    <div class="form-input">
        <label for="repass"> Repetir contraseña
            <?php echo form_input(['name' => 'repass', 'id' => 'repass', 'type' => 'password', 'placeholder' => '••••••••']); ?>
        </label>
    </div>
    <div>
        <?php echo form_submit('Registrarse', 'Registrarse', "class='btn boton_formularios boton_registrarse'"); ?>
    </div>
    <?php echo form_close(); ?>

</main>