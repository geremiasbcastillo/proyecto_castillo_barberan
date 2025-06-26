<?php if($compras == null){ ?>
    <h2 class="text-center alert alert-danger mt-3">No hay compras disponibles</h2>
<?php } else { ?>
    <div class="container formulario-agregar-producto container-listar-productos justify-content-center">
        <h1 class="text-center">Mis Compras</h1>
        <div class="d-flex flex-row justify-content-center">
            <div class="row d-flex flex-row justify-content-center">
                <?php foreach($compras as $compra) { ?>
                            <div class="col-md-4 lista-productos">
                                <h5><?= esc(session('nombre').' '.session('apellido')) ?></h5>
                                <h6><?= esc('Numero de compra: '.$compra['id_ventas']) ?></h6>
                                <h6><?= esc($compra['venta_fecha']) ?></h6>
                                <h5>Productos</h5>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre del producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sumador = 0;
                                        foreach($detalle_ventas as $detalle) {
                                            if($detalle['venta_id'] == $compra['id_ventas']) { ?>
                                                <tr>
                                                    <td><?= esc($detalle['producto_nombre']) ?></td>
                                                    <td><?= esc($detalle['detalle_cantidad']) ?></td>
                                                    <td><?= esc('$'.($detalle['detalle_precio']*$detalle['detalle_cantidad'])) ?></td>
                                                </tr>
                                                <?php $sumador += $detalle['detalle_precio']*$detalle['detalle_cantidad'];
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                                <h5>Total: <?= esc('$'.$sumador) ?></h5>
                            </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>