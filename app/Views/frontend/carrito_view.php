<main> <?php $cart = \Config\Services::cart(); ?>
<div class="container formulario-agregar-producto align-items-center">
<h1 class="text-center">Carrito de compras</h1>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert alert-danger">Carrito está vacío</h2>
<?php } else { ?>
<a href="catalogo" class="btn btn-success boton-carrito" role="button">Continuar comprando</a>
// agregar mensaje

<table id="mytable" class="table tabla-carrito table-bordered table-striped mt-3">
    <?php if ($cart1 = $cart->contents()) : ?>
        <thead>
                <td>Nº item</td>
                <td>Nombre</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Subtotal</td>
                <td>Acción</td>
        </thead>
        <tbody>
<?php
    $total = 0;
    $i = 1;
    foreach ($cart1 as $item):?>
        <td><?php echo $i++; ?></td>
        <td><?php echo $item['name']; ?> </td>
        <td><?php echo $item['price']; ?></td>
        <td><?php echo $item['qty']; ?></td>
        <td><?php echo $item['subtotal']; ?></td>
        <td><a href="<?php echo base_url('eliminar_carrito/'.$item['rowid'])?>">Eliminar</a></td>
    </tr>
    <?php $total += $item['subtotal']; ?>
<?php endforeach; ?>
<tr>
    <td>Total Compra: $<?php echo $total; ?> </td>
    <td><a href="ventas" class="btn btn-success" role="button">Ordenar compra</a></td>
</tr>
<?php endif; ?>
</tbody>
</table>
<a href="<?php echo base_url('vaciar_carrito'); ?>" class="btn boton-form boton-carrito">Vaciar carrito</a>
<?php } ?>
</div>
</main>