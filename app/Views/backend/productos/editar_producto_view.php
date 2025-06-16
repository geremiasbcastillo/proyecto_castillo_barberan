<?php helper('form'); ?>
<h1 class="text-center">Edición de Productos</h1>
<div class="container">
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
    
    <div class="w-50 mx-auto">
        <?php echo form_open_multipart("actualizar"); ?>
        
        <div class="form-group">
            <label for="titulo">Nombre del producto</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['producto_nombre']]); ?>
        </div>
        
        <div class="form-group">
            <label for="stock">Descripcion</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'value'=>$producto['producto_descripcion']]); ?>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad</label>
            <?php echo form_input(['name' => 'cantidad', 'id' => 'cantidad', 'class' => 'form-control', 'value'=>$producto['producto_cantidad']]); ?>
        </div>
        
        <div class="form-group">
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

        <div class="form-group">
            <label for="precio">Precio</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'value'=>$producto['producto_precio']]); ?>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <img src="<?php echo base_url('public/assets/upload/'.$producto['producto_imagen']); ?>" alt="" height="100" width="100" />
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file']); ?>
            <?php if(isset($validation['imagen'])){
                echo form_hidden('imagen', $producto['producto_imagen']);
            }?>
        </div>
        <?php echo form_hidden('id_producto', $producto["id_producto"]); ?>

        <div class="form-group">
            <?php echo form_submit('Modificar', 'Modificar', 'class="btn btn-success"'); ?>
        </div>
        
        <?php echo form_close(); ?>
    </div>
</div>
