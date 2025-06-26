<?php helper('form'); ?>
<main>
    <?php if(!empty($validation)):?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach($validation as $error):?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif ?>

    <?php if (session('mensaje_error')){ ?>
        <div class="alert alert-danger" role="alert">
            <?= session('mensaje_error') ?>
        </div>
    <?php } ?>

    <?php echo form_open('verificar_usuario', ['class' => 'formularios']); ?>
        <h2 class ="text-center"> Inicie sesion con su cuenta</h2>
        <div class="mb-3">
            <label for="correo">Dirección de correo electrónico</label>
            <?php echo form_input(['name'=>'correo', 'id'=>'correo', 'type'=>'email', 'class'=>'form-control', 'placeholder'=>'andresbarberan@gmail.com']);?>
        </div>
        <div class="mb-3">
            <label for="contrasena">Contraseña</label>
            <?php echo form_input(['name'=>'contrasena', 'id'=>'contrasena', 'type'=>'password', 'class'=>'form-control', 'placeholder'=>'••••••••']);?>
        </div>
        <?php echo form_submit('Iniciar sesion', 'Iniciar sesion', "class='btn boton_formularios'");?>
    <?php echo form_close(); ?>

</main>
