<?php helper('form'); ?>
<div class="contenedor-filtros">
    <div class="row mb-3 justify-content-center">
        <h3 class="text-center mt-3">Busqueda y filtros</h3>

        <?php echo form_open('ver_ventas', ['method' => 'get']); ?>
        <div class="mb-3 mx-3 w-50">
            <label for="searchInput" class="form-label">Buscar por nombre:</label>
            <?= form_input([
                            'type' => 'text',
                            'name' => 'nombre',
                            'id' => 'searchInput',
                            'class' => 'form-control search-input',
                            'placeholder' => 'Buscar clientes',
                            'value' => esc($filtros['nombre'] ?? '')
                        ]); ?>
        </div>
        <div class="row mx-1">

            <div class="col-4 mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <?= form_input([
                            'type' => 'date',
                            'name' => 'fecha_inicio',
                            'id' => 'fecha_inicio',
                            'class' => 'form-control search-input',
                            'value' => esc($filtros['fecha_inicio'] ?? '')
                        ]); ?>
            </div>
            <div class="col-4 mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <?= form_input([
                            'type' => 'date',
                            'name' => 'fecha_fin',
                            'id' => 'fecha_fin',
                            'class' => 'form-control search-input',
                            'value' => esc($filtros['fecha_fin'] ?? '')
                        ]); ?>
            </div>
            <div class="col-4 mt-4">
                <?php echo form_button([
                            'type' => 'submit',
                            'class' => 'btn boton-form mt-2',
                            'content' => '<i class="fas fa-search"></i>'
                        ]); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="col-md-auto text-center justify-content-center">
            <a href="<?= base_url('ver_ventas') ?>" class="btn boton-form">Limpiar todos los filtros</a>
        </div>
    </div>
</div>
</div>

<?php if($ventas == NULL) { ?>
<h2 class="text-center alert alert-danger">No existen ventas guardadas!</h2>
<?php } else { ?>
<div class="container formulario-agregar-producto container-listar-productos justify-content-center">
    <h1 class="text-center">Listado de Ventas</h1>
    <div class="d-flex flex-row justify-content-center">
        <div class="row d-flex flex-row justify-content-center">
            <?php foreach($ventas as $row){
                
                $id = $row['id_ventas'];
                $sumador = 0?>
            <div class="col-md-4 lista-productos">
                <h5><?php echo esc($row['nombre_usuarios'].' '.$row['apellido_usuarios']); ?></h5>
                <h6><?php echo esc('Numero de compra: '.$row['id_ventas']); ?></h6>
                <h6><?php echo esc($row['venta_fecha']); ?></h6>
                <h5>Productos</h5>
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <?php foreach($detalle_ventas as $row) { ?>
                    <?php if($row['id_ventas'] == $id) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo esc($row['producto_nombre']); ?></td>
                            <td><?php echo esc($row['detalle_cantidad']); ?></td>
                            <td><?php echo esc('$'.$row['detalle_precio']*$row['detalle_cantidad']); ?></td>
                        </tr>
                        <?php $sumador = $sumador + $row['detalle_precio']*$row['detalle_cantidad'];?>
                    </tbody>
                    <?php } ?>
                    <?php } ?>
                </table>
                <h5>Total: <?php echo esc('$'.$sumador); ?></h5>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php } ?>