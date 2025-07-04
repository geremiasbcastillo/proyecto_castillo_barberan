<?php if (session('mensaje_consulta')): ?>
    <div class="alert alert-success" role="alert">
        <?= session('mensaje_consulta') ?>
    </div>
<?php endif; ?>
<div class="container formulario-agregar-producto formulario-consultas">
    <?php if($consultas_no_leidas == NULL) { ?>
        <h2 class="text-center alert alert-danger mt-3 ">No hay consultas sin leer</h2>
    <?php } else { ?>
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
                    <?php foreach($consultas_no_leidas as $row) { ?>
                        <tr>
                            <td><?php echo esc($row['nombre_mensaje']); ?></td>
                            <td><?php echo esc($row['telefono_mensaje']); ?></td>
                            <td><?php echo esc($row['correo_mensaje']); ?></td>
                            <td><?php echo esc($row['titulo_mensaje']); ?></td>
                            <td ><a class ="btn btn-danger" href="<?= base_url('marcar_leido/'.$row['id_mensaje']) ?>">Marcar leído</a></td>
                        </tr>
                        <tr>
                            <td colspan="5"><?php echo esc($row['consulta_mensaje']); ?></td>
                        <?php } ?>       
                </tbody>
            </table>
    <?php } ?>
            
    <section class="collapsible ">
        <h1 class="collapsible-header">Consultas ya leídas</h1>
        <div class="collapsible-content">
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
                    <?php foreach($consultas_leidas as $row) { ?>
                        <tr>
                            <td><?php echo esc($row['nombre_mensaje']); ?></td>
                            <td><?php echo esc($row['telefono_mensaje']); ?></td>
                            <td><?php echo esc($row['correo_mensaje']); ?></td>
                            <td><?php echo esc($row['titulo_mensaje']); ?></td>
                            <td><button class="btn btn-success">Leído</button></td>
                        </tr>
                        <tr>
                            <td colspan="5"><?php echo esc($row['consulta_mensaje']); ?></td>
                        <?php } ?>       
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
  const collapsibles = document.querySelectorAll('.collapsible');

  collapsibles.forEach(collapsible => {
    const header = collapsible.querySelector('.collapsible-header');
    const content = collapsible.querySelector('.collapsible-content');

    header.addEventListener('click', function() {
      content.classList.toggle('active');
    });
  });
});
</script>