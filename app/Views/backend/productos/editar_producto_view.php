<?php helper('form'); ?>
<div class="container container-editar">
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
    
    <div class="row">
        <div class="col-12">
        <?php echo form_open_multipart('actualizar', ['class' => 'formulario-agregar-producto ']); ?>
        <h2 class="text-center"> Edición de Productos</h1>
        <div class="form-input">
            <label for="titulo">Nombre del producto</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['producto_nombre']]); ?>
        </div>
        
        <div class="form-input">
            <label for="stock">Descripcion</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'value'=>$producto['producto_descripcion']]); ?>
        </div>

        <div class="form-input">
            <label for="stock">Cantidad</label>
            <?php echo form_input(['name' => 'cantidad', 'id' => 'cantidad', 'class' => 'form-control', 'value'=>$producto['producto_cantidad']]); ?>
        </div>
        
        <div class="form-input">
            <label for="categoria">Categoría</label>
            <?php
                $lista[0] = 'Seleccione categoría';
                foreach ($categoria as $row) {
                    $lista[$row['id_categoria']] = $row['nombre_categoria'];
                }
                $sel = $producto['producto_categoria'];
                echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
            ?>
        </div>

        <div class="form-input">
            <label for="precio">Precio</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'value'=>$producto['producto_precio']]); ?>
        </div>

        <div class="form-input">
            <label for="imagen">Imagen</label>
            <img src="<?php echo base_url('public/assets/upload/'.$producto['producto_imagen']); ?>" alt="" height="100" width="100" />
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'class'=>'form-control' ]); ?>
            <?php if(isset($validation['imagen'])){
                echo form_hidden('imagen', $producto['producto_imagen']);
            }?>
        </div>
        <?php echo form_hidden('id_producto', $producto["id_producto"]); ?>

        <div class="form-input">
            <?php echo form_submit('Modificar', 'Modificar', 'class="btn boton-form"'); ?>
        </div>
        
        <?php echo form_close(); ?>
        </div>
    </div>
</div>
