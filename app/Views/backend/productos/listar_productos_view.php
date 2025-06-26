<?php helper('form'); ?>
<div class="contenedor-filtros">
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="text-center">Busqueda y filtros</h3>
            <div class="search-container">
                <?php echo form_open('gestionar', ['method' => 'get']); ?>
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">Buscar por nombre:</label>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'nombre',
                            'id' => 'searchInput',
                            'class' => 'form-control search-input',
                            'placeholder' => 'Buscar productos',
                            'value' => esc($filtros['nombre'] ?? '')
                        ]); ?>
                    </div>
                        <?php echo form_button([
                            'type' => 'submit',
                            'class' => 'btn boton-form mt-2',
                            'content' => '<i class="fas fa-search"></i>'
                        ]); ?>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <a href="<?= base_url('gestionar') ?>" class="btn boton-form">Limpiar todos los filtros</a>
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