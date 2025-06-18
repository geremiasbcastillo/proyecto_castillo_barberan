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

        return view('plantillas/nav_view', $data)
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
        $usuarioModel = new \App\Models\Usuarios_model();
        
        $usuario = $usuarioModel->where('id_usuarios', session('id'))->first();
        
        if(!$usuario['telefono_usuarios'] || !$usuario['dni_usuarios']){
            return redirect()->route('perfil')->with('mensaje', 'Por favor, complete su perfil antes de realizar una compra.');
        }

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

    public function eliminar_item($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->route('ver_carrito')->with('mensaje', 'Producto eliminado del carrito exitosamente!');
    }

    public function listar_ventas(){
        $venta = new Ventas_model();
        $detalle = new Detalle_ventas_model();
        $producto = new Productos_model();
        $data = ['ventas' => $venta
            ->join('usuarios', 'usuarios.id_usuarios = ventas.cliente_id')
            ->findAll()];

        $data['detalle_ventas'] = $detalle
            ->join('ventas', 'ventas.id_ventas = detalle_ventas.venta_id')
            ->join('productos', 'productos.id_producto = detalle_ventas.producto_id')
            ->findAll();
        
        $data['titulo'] = 'Historial de Ventas';
        return view('plantillas/nav_admin_view', $data)
            .view('backend/listar_ventas_view');
    }

    public function limpiar_carrito(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', 'Carrito vaciado exitosamente!');
    }
}