<?php helper('form'); ?>
<div class="wrapper">
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
        <div class="mb-3 form-check">
            <label for="check" class="form-check-label">Recuerdame</label>
            <?php echo form_checkbox(['name'=>'check', 'id'=>'check', 'class'=>'form-check-input form-control']);?>
        </div>
        <?php echo form_submit('Iniciar sesion', 'Iniciar sesion', "class='btn boton_formularios'");?>
    <?php echo form_close(); ?>
</div>
