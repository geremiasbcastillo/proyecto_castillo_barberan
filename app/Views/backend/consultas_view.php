<?php if($consultas == NULL) { ?>
    <h2 class="text-center alert alert-danger mt-3 ">No hay consultas disponibles</h2>
<?php } else { ?>
            <?php if (session('mensaje_consulta')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session('mensaje_consulta') ?>
                </div>
        <?php endif; ?>
<div class="container formulario-agregar-producto">
    <h1 class="text-center">Listado de consultas</h1>
    <table id="mytable" class="table tabla-consultas table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Titulo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($consultas as $row) { ?>
                <tr>
                    <td><?php echo esc($row['nombre_mensaje']); ?></td>
                    <td><?php echo esc($row['telefono_mensaje']); ?></td>
                    <td><?php echo esc($row['correo_mensaje']); ?></td>
                    <td><?php echo esc($row['titulo_mensaje']); ?></td>
                    <?php if($row['estado_mensaje'] == 1) { ?>
                        <td><button class="btn btn-success">Leído</button></td>
                    <?php } else { ?>
                        <td ><a class ="btn btn-danger" href="<?= base_url('marcar_leido/'.$row['id_mensaje']) ?>">No leído</a></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Mensaje</th>
                    <td colspan="5"><?php echo esc($row['consulta_mensaje']); ?></td>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>