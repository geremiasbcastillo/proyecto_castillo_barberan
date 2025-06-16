<?php helper('form'); ?>

<div class="container">
    <div class="w-50 mx-auto">
        <?php if(!empty($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach($validation as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <?php if(session('mensaje')){ ?>
            <div class="alert alert-success" role="alert">
                <?= session('mensaje') ?>
            </div>
        <?php }?>

        <?php echo form_open_multipart('agregar_producto', ['class' => 'formulario-agregar-producto']) ?>
        <h2 class="text-center"> Registro de productos</h1>
            <div class="form-input">
                <label for="nombre">Nombre del producto</label>
                <?php echo form_input(['name' => 'nombre', 'id'=>'nombre', 'type'=>'text', 'class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto', 'value' => set_value('nombre')]); ?>
            </div>
            <div class="form-input">
                <label for="descripcion">Descripcion del producto</label>
                <?php echo form_input(['name' => 'descripcion', 'id'=>'descripcion', 'type'=>'text', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripcion del producto', 'value' => set_value('descripcion')]); ?>
            </div>    
            <div class="form-group">
                <label for="categoria">Categoria del producto</label>
                <?php
                    $lista['0'] = 'Seleccione una categoria';
                    foreach ($producto_categoria as $row){
                        $categoria_id = $row['id_categoria'];
                        $categoria_descripcion = $row['nombre_categoria'];
                        $lista[$categoria_id] = $categoria_descripcion;
                    }
                    echo form_dropdown('categoria', $lista, '0', 'class = "form-control"');
                ?>
            </div>
            <div class="form-input">
                <label for="precio">Precio del producto</label>
                <?php echo form_input(['name' => 'precio', 'id'=>'precio', 'type'=>'number', 'class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto', 'value' => set_value('precio')]); ?>
            </div>
            <div class="form-input">
                <label for="cantidad">Cantidad del producto</label>
                <?php echo form_input(['name' => 'cantidad', 'id'=>'cantidad', 'type'=>'number', 'class' => 'form-control', 'placeholder' => 'Ingrese la cantidad del producto', 'value' => set_value('cantidad')]); ?>
            </div>
            <div class="form-input">
                <label for="imagen">Imagen del producto</label>
                <?php echo form_input(['name' => 'imagen', 'id'=>'imagen', 'type'=>'file', 'class' => 'form-control', 'value'=>set_value('imagen')]); ?>
            </div>
            <div class="form-input mt-3">
                <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
            </div>
            
        <?php echo form_close(); ?>  
    </div>
</div>