<?php

namespace App\Controllers;

use App\Models\Productos_model;
use App\Models\Detalle_ventas_model;
use App\Models\Ventas_model;
use App\Models\Categorias_model;

class Cart_controller extends BaseController
{
    public function ver_carrito(){
        $cart = \Config\Services::cart();
        $data['titulo'] = 'Carrito de Compras';

        return view('plantillas/header_view', $data)
            .view('plantillas/nav_view')
            .view('frontend/carrito_view').view('plantillas/footer_view');
    }

    public function agregar_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $data = array(
            'id' => $request->getPost('id'),
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'qty' => 1,
            );
        $cart->insert($data);
        return redirect()->route('ver_carrito')->with('mensaje', 'Producto agregado al carrito exitosamente!');
    }

    public function guardar_venta(){
        $cart = \Config\Services::cart();
        $producto = new Productos_model();
        $detalle = new Detalle_ventas_model();
        $venta = new \App\Models\Ventas_model();

        $carrito = $cart->contents();

        foreach ($carrito as $item) {
            $productos = $producto->where('id_producto', $item['id'])->first();
            if ($productos['producto_cantidad'] < $item['qty']) {
                return redirect()->route('ver_carrito')->with('mensaje', 'No hay suficiente stock para el producto');
            }
        }
        
        $data = array(
            'cliente_id' => session('id'),
            'venta_fecha' => date('Y-m-d'),
        );
        $venta_id = $venta->insert($data);
        
        $carrito = $cart->contents();
        foreach ($carrito as $item) {
            $detalle_venta = array(
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
            );
            $productos = $producto->where('id_producto', $item['id'])->first();
            
            $data =[
                'producto_cantidad' => $productos['producto_cantidad'] - $item['qty'],
            ];

            $producto->update($item['id'], $data);

            $detalle->insert($detalle_venta);
        }
        $cart->destroy();
        return redirect()->route('catalogo')->with('mensaje', 'Compra realizada exitosamente!');
    }
}