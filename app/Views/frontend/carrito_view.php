<main> <?php $cart = \Config\Services::cart(); ?>
<?php helper('form'); ?>

<?php if (session('mensaje')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session('mensaje'); ?>
    </div>
<?php endif; ?>

<div class="container formulario-agregar-producto align-items-center">
<h1 class="text-center">Carrito de compras</h1>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert alert-danger">Carrito está vacío</h2>
<?php } else { ?>
    <a href="catalogo" class="btn btn-success boton-carrito" role="button">Continuar comprando</a>

    <?php if (session('mensaje_carrito')): ?>
        <div class="alert alert-danger mt-4 w-50" role="alert">
            <?= session('mensaje_carrito'); ?>
        </div>
    <?php endif; ?>

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
            <?php $total = 0;
            $i = 1;
            foreach ($cart1 as $item):?>
                <td><?php echo $i++; ?></td>
                <td><?php echo $item['name']; ?> </td>
                <td><?php echo $item['price']; ?></td>
                <td>
                    <?php echo form_open('actualizar_carrito'); ?>
                        <input type="hidden" name="rowid" value="<?= esc($item['rowid']) ?>">
                        <input type="number" name="qty" value="<?= esc($item['qty']) ?>" class="form-control form-control-sm" style="width:70px;">
                    <?php echo form_close(); ?>
                </td>
                <td><?php echo $item['subtotal']; ?></td>
                <td><a href="<?php echo base_url('eliminar_carrito/'.$item['rowid'])?>">Eliminar</a></td>
                </tr>
                <?php $total += $item['subtotal']; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan ="4">Total Compra: $<?php echo $total; ?> </td>
                <td colspan ="2"><a href="ventas" class="btn btn-success" role="button">Ordenar compra</a></td>
            </tr>
            </tbody>
        <?php endif; ?>
    </table>
    <a href="<?php echo base_url('vaciar_carrito'); ?>" class="btn boton-form boton-carrito">Vaciar carrito</a>
<?php } ?>
</div>
</main>