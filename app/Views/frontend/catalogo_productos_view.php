<?php helper('form'); ?>
<div class="container">
    <?php if (session('mensaje')) { ?>
        <div class="alert alert-success my-4" role="alert">
            <?= session('mensaje') ?>
        </div>
    <?php } ?>

    <div class="catalog-hero">
        <div class="catalog-container">
            <div class="catalog-title">
                <h1><i class="fas fa-store me-3"></i>Catálogo de Productos</h1>
                <p class="catalog-subtitle">Descubre nuestra increíble colección de productos</p>
            </div>
        </div>
    </div>
</div>
<div class="container contenedor-filtros">

    <div class="row justify-content-center">
        <h3 class="text-center">Busqueda y filtros</h3>

        <?php echo form_open('filtrar_productos'); ?>
        <label for="searchInput" class="form-label">Buscar por nombre:</label>
        <?= form_input([
            'type' => 'text',
            'name' => 'nombre',
            'id' => 'searchInput',
            'class' => 'form-control search-input',
            'placeholder' => 'Buscar productos',
            'value' => esc($filtros['nombre'] ?? '')
        ]); ?>

        <div class="row justify-content-center align-items-center">
            <div class="col-3">
            <label for="categoria" class="form-label">Filtrar por categoría:</label>
            <?= form_dropdown(
                'categoria',
                ['' => 'Todas las categorías'] + array_column($categoria, 'nombre_categoria', 'id_categoria'),
                $filtros['categoria'] ?? '',
                ['class' => 'form-select search-select mb-1']
            ); ?></div>
            <div class="col-3">
            <label for="precio_minimo" class="form-label">Precio mínimo:</label>
            <?php echo form_input([
                'type' => 'number',
                'name' => 'precio_minimo',
                'id' => 'precio_minimo',
                'placeholder' => '0...',
                'class' => 'form-control search-input mb-1',
                'value' => esc($filtros['precio_minimo'] ?? '')
            ]); ?></div>
            <div class="col-3">
            <label for="precio_maximo" class="form-label">Precio máximo:</label>
            <?php echo form_input([
                'type' => 'number',
                'name' => 'precio_maximo',
                'id' => 'precio_maximo',
                'placeholder' => '100000...',
                'class' => 'form-control search-input mb-1',
                'value' => esc($filtros['precio_maximo'] ?? '')
            ]); ?></div>
            <div class="col-3">
            <?php echo form_button([
                'type' => 'submit',
                'class' => 'btn boton-form mt-4',
                'content' => '<i class="fas fa-search"></i>'
            ]); ?></div>
        </div>
        <?php echo form_close(); ?>
        <div class="col-md-auto text-center justify-content-center">
            <a href="<?= base_url('catalogo') ?>" class="btn boton-form my-4">Limpiar todos los filtros</a>
        </div>
        

    </div>



</div>
<?php if ($producto == NULL) { ?>
    <h2 class="text-center alert alert-danger">No hay productos disponibles</h2>
<?php } else { ?>
    <div class="contenedor-catalogo">
        <h1 class="display-4 text-center mb-4">Lista de productos</h1>
        <div class="row ">
            <?php foreach ($producto as $row) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center">
                        <img class="card-img-top" src="<?php echo base_url('public/assets/upload/' . $row['producto_imagen']); ?>"
                            width=100 height=100 alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['producto_nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['producto_descripcion']; ?> </p>
                            <p class="card-text"><?php echo "$";
                            echo $row['producto_precio']; ?> </p>
                            <p class="card-text"><?php echo "Categoria: ";
                            echo $row['nombre_categoria']; ?> </p>
                            <p class="card-text"><?php echo "Stock: ";
                            echo $row['producto_cantidad']; ?> </p>
                            <?php if (session('login')) {
                                echo form_open('agregar_al_carrito');
                                echo form_hidden('id', $row['id_producto']);
                                echo form_hidden('nombre', $row['producto_nombre']);
                                echo form_hidden('precio', $row['producto_precio']);
                                echo form_submit('comprar', 'Agregar al carrito', ['class' => 'btn btn-success']);
                                echo form_close();
                            } ?>
                            <hr>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
</div>