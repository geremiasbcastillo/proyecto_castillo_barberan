<?php if($venta == NULL) { ?>
    <h2 class="text-center alert alert-danger">No existen ventas guardadas!</h2>
<?php } else { ?>
<div class="container formulario-agregar-producto">
    <h1 class="text-center">Listado de Ventas</h1>
    <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <tr>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($venta as $consulta) { ?>
                <tr>
                    <td><?php echo esc($consulta['nombre_mensaje']); ?></td>
                    <td><?php echo esc($consulta['telefono_mensaje']); ?></td>
                    <td><?php echo esc($consulta['correo_mensaje']); ?></td>
                    <td><?php echo esc($consulta['titulo_mensaje']); ?></td>
                    <td><?php echo esc($consulta['consulta_mensaje']); ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>