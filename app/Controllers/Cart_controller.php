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
                return redirect()->route('ver_carrito')->with('mensaje', 'No hay suficiente stock para el producto '. $item['name'] .'.');
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

        // Filtros para la búsqueda
        $nombre = $this->request->getGet('nombre');
        $fecha_inicio = $this->request->getGet('fecha_inicio');
        $fecha_fin = $this->request->getGet('fecha_fin');
        
        $venta->select('ventas.*, usuarios.nombre_usuarios, usuarios.apellido_usuarios')
            ->join('usuarios', 'usuarios.id_usuarios = ventas.cliente_id');

        if ($nombre) {
            $venta->like('nombre_usuarios', $nombre);
            $venta->orLike('apellido_usuarios', $nombre);
            $venta->orWhere("CONCAT(usuarios.nombre_usuarios, ' ', usuarios.apellido_usuarios) LIKE", "%$nombre%");
        }
        if ($fecha_inicio) {
            $venta->where('venta_fecha >=', $fecha_inicio);
        }
        if ($fecha_fin) {
            $venta->where('venta_fecha <=', $fecha_fin);
        }

        $data['ventas'] = $venta->findAll();

        $data['detalle_ventas'] = $detalle
            ->join('ventas', 'ventas.id_ventas = detalle_ventas.venta_id')
            ->join('productos', 'productos.id_producto = detalle_ventas.producto_id')
            ->findAll();   
        
        $data['filtros'] = [
            'nombre' => $nombre,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];
        
        $data['titulo'] = 'Historial de Ventas';
        return view('plantillas/nav_admin_view', $data)
            .view('backend/listar_ventas_view');
    }

    public function limpiar_carrito(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', 'Carrito vaciado exitosamente!');
    }


    public function actualizar_carrito() {
        $cart = \Config\Services::cart();

        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qty');

        
        if ($qty <= 0) {
            return redirect()->route('ver_carrito')->with('mensaje_carrito', 'Cantidad invalida, ingrese al menos 1 de cada producto.');
        }

        $cart->update([
            'rowid' => $rowid,
            'qty' => $qty
        ]);
        return redirect()->route('ver_carrito')->with('mensaje', 'Cantidad actualizada correctamente');
    }
}