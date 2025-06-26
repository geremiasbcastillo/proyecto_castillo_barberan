<?php if($usuarios == NULL) { ?>
<h2 class="text-center alert alert-danger">No existen ventas guardadas!</h2>
<?php } else { ?>
    <?php if (session('mensaje')){ ?>
        <div class="alert alert-success" role="alert">
            <?= session('mensaje') ?>
        </div>
    <?php } ?>
    <div class="container formulario-agregar-producto container-listar-productos justify-content-center">
        <h1 class="text-center">Lista de usuarios</h1>
        <div class="d-flex flex-row justify-content-center">
            <div class="row d-flex flex-row justify-content-center">
                <?php foreach($usuarios as $row){
                    
                    $id = $row['id_usuarios'];
                    $sumador = 0?>
                <div class="col-md-3 lista-productos">
                    <h5><?php echo esc($row['nombre_usuarios'].' '.$row['apellido_usuarios']); ?></h5>
                    <p><?php echo esc('Rol: '.$row['perfil_descripcion']); ?></p>
                    <?php if($row['persona_estado'] == 0){ ?>
                        <a href="<?php echo base_url('activar_usuario/'.$row['id_usuarios']);?>" class="btn btn-danger">Activar</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('desactivar_usuario/'.$row['id_usuarios']);?>" class="btn btn-success">Desactivar</a>
                    <?php } ?>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
<?php } ?>