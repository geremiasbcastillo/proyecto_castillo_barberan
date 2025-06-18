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
                <div class="col-md-4 p-3 lista-productos">
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