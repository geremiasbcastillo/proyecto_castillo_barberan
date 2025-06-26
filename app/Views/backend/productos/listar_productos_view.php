<?php helper('form'); ?>
<div class="container contenedor-filtros">

    <div class="row justify-content-center">
            <h3 class="text-center mt-3">Busqueda y filtros</h3>
            <?php echo form_open('gestionar', ['method' => 'get']); ?>
            <div class="d-flex align-items-center">
            <div>
                <label for="searchInput" class="form-label mx-4">Buscar por nombre:</label>
                <?= form_input([
                    'type' => 'text',
                    'name' => 'nombre',
                    'id' => 'searchInput',
                    'class' => 'form-control search-input mx-4 w-100',
                    'placeholder' => 'Buscar productos',
                    'value' => esc($filtros['nombre'] ?? '')
                ]); ?>
            </div>    
            
                <?php echo form_button([
                    'type' => 'submit',
                    'class' => 'btn boton-form mt-2 mx-5',
                    'content' => '<i class="fas fa-search"></i>'
                ]); ?>
            </div>
            
            <div class="col-md-auto text-center justify-content-center">
                <a href="<?= base_url('gestionar') ?>" class="btn boton-form my-4">Limpiar todos los filtros</a>
            </div>
            
    </div>
</div>

<div class="container tabla-listas formulario-agregar-producto">
<h1 class="text-center">Listado de productos </h1>
    <table id="mytable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th></th>
            <th>Activar / Eliminar</th>
        </thead>
        <tbody>
            
            <?php foreach($productos as $row){ ?>
                <tr>
                    <td><?php echo $row['producto_nombre'];?></td>
                    <td><?php echo $row['producto_descripcion'];?></td>
                    <td><?php echo $row['nombre_categoria'];?></td>
                    <td><?php echo $row['producto_precio'];?></td>
                    <td><?php echo $row['producto_cantidad'];?></td>
                    <td><img src="<?php echo base_url('public/assets/upload/'.$row['producto_imagen']); ?>" alt="" height ="100" width ="100"/></td>
                    <td><a class="btn btn-success" href="<?php echo base_url('editar/'.$row['id_producto']);?>">Editar</a></td>
                <?php 
                if($row['producto_estado'] == 1) 
                {?>
                    <td><a  class="btn btn-danger" href="<?php echo base_url('eliminar/'.$row['id_producto']);?>">Eliminar</a></td>
                <?php } else { ?>
                    <td><a  class="btn btn-danger" href="<?php echo base_url('activar/'.$row['id_producto']);?>">Activar</a></td>
                <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>