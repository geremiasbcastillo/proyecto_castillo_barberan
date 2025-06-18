<?php helper('form'); ?>
<main>
<div class="container ">
    <?php if(!empty($validation)):?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach($validation as $error):?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if(session('mensaje')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('mensaje'); ?>
    </div>
<?php endif; ?>
    <div class="row">
        <div class="col-12">
            <?php echo form_open('actualizar_perfil', ['class' => 'formulario-agregar-producto']); ?>
            <h1 class="text-center">Perfil de usuario</h1>
                <div class="form-input">
                    <label for="nombre">Nombre</label>
                    <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'value'=>$usuario['nombre_usuarios']]); ?>
                </div>
                <div class="form-input">
                    <label for="apellidos">Apellido</label>
                    <?php echo form_input(['name' => 'apellidos', 'id' => 'apellidos', 'class' => 'form-control', 'value'=>$usuario['apellido_usuarios']]); ?>
                </div>
                <div class="form-input">
                    <label for="correo">Correo</label>
                    <?php echo form_input(['name' => 'correo', 'id' => 'correo', 'class' => 'form-control', 'value'=>$usuario['correo_usuarios']]); ?>
                </div>
                <div class="form-input">
                    <label for="telefono">Telefono</label>
                    <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'class' => 'form-control', 'value'=>$usuario['telefono_usuarios']]); ?>
                </div>
                <div class="form-input">
                    <label for="dni">Dni</label>
                    <?php echo form_input(['name' => 'dni', 'id' => 'dni', 'class' => 'form-control', 'value'=>$usuario['dni_usuarios']]); ?>
                </div>
                <?php echo form_hidden('id', $usuario['id_usuarios']); ?>
                <div class="form-input">
                    <?php echo form_submit('Envia', 'Envia', 'class="btn boton-form"'); ?>
                </div>
            <?php echo form_close(); ?>
    </div>
</div>
</main>