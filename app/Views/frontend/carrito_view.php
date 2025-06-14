<?php $cart = \Config\Services::cart(); ?>

<h1 class="text-center">Carrito de compras</h1>
<a href="catalogo" class="btn btn-success" role="button">Continuar comprando</a>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert alert-danger">Carrito está vacío</h2>
<?php } ?>

<table id="mytable" class="table table-bordered table-striped">
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
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $item['name']; ?> </td>
        <td>$ <?php echo $item['price']; ?></td>
        <td><?php echo $item['qty']; ?></td>
        <td><?php echo $item['subtotal']; ?></td>
        <td><?php echo anchor('eliminar_item/'.$item['rowid'],'Eliminar'); ?> </td>
    </tr>
    <?php $total += $item['subtotal']; ?>
<?php endforeach; ?>
<tr>
    <td>Total Compra: $<?php echo $total; ?> </td>
    <td><a href="ventas" class="btn btn-success" role="button">Ordenar compra</a></td>
</tr>
<a href="<?php echo base_url('vaciar_carrito/all'); ?>" class="btn btn-success">Vaciar carrito</a>
<?php endif; ?>
</tbody>
</table>