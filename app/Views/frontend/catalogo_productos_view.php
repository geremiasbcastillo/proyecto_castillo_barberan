<?php helper('form'); ?>
<div class="container">
    <h1 class="display-4 text-center">Lista de productos</h1>
    <div class="row">
        <?php foreach($producto as $row) { ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <img class="card-img-top" src="<?php echo base_url('public/assets/uploads/'.$row['producto_imagen']); ?>" width=150 height=150 alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['producto_nombre']; ?></h5>
                        <p class="card-text"><?php echo $row['producto_descripcion']; ?> </p>
                        <p class="card-text"><?php echo "$"; echo $row['producto_precio']; ?> </p>
                        <p class="card-text"><?php echo "Categoria: "; echo $row['nombre_categoria']; ?> </p>
                        <p class="card-text"><?php echo "Stock: "; echo $row['producto_cantidad']; ?> </p>
                        <?php if(session('login')){ 
                            echo form_open('agregar_al_carrito');
                            echo form_hidden('id', $row['id_producto']);
                            echo form_hidden('nombre', $row['producto_nombre']);
                            echo form_hidden('precio', $row['producto_precio']);
                            echo form_submit('comprar', 'Agregar al carrito', ['class' => 'btn btn-success']);
                        echo form_close();
                        }?>
                        <hr>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>