<?php helper('form'); ?>
<h1 class="text-center">Listado de productos disponibles</h1>
<div class="container">
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
                    <td><img src="<?php echo base_url('assets/uploads/'.$row['producto_imagen']); ?>" alt="" height ="100" width ="100"/></td>
                    <td><a class="btn btn-success" href="<?php echo base_url('editar_producto/'.$row['id_producto']);?>">Editar</a></td>
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