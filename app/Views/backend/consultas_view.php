<?php if($consultas == NULL) { ?>
    <h2 class="text-center alert alert-danger">No hay consultas disponibles</h2>
<?php } else { ?>
<div class="container formulario-agregar-producto">
    <h1 class="text-center">Listado de consultas</h1>
    <table id="mytable" class="table tabla-consultas table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Titulo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($consultas as $consulta) { ?>
                <tr>
                    <td><?php echo esc($consulta['nombre_mensaje']); ?></td>
                    <td><?php echo esc($consulta['telefono_mensaje']); ?></td>
                    <td><?php echo esc($consulta['correo_mensaje']); ?></td>
                    <td><?php echo esc($consulta['titulo_mensaje']); ?></td>                    
                </tr>
                <tr>
                    <th>Mensaje</th>
                    <td colspan="5"><?php echo esc($consulta['consulta_mensaje']); ?></td>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>