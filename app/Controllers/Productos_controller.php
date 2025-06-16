<?php

namespace App\Controllers;

use App\Models\Productos_model;
use App\Models\Categorias_model;

class Productos_controller extends BaseController
{
    public function agregar_producto(){
        $categoria = new Categorias_model();
        $data['producto_categoria'] = $categoria->findAll();
        $data['titulo'] = 'Agregar Producto';
        return view('plantillas/header_view', $data)
            .view('plantillas/nav_admin_view')
            .view('backend/agregar_producto_view');
    }    
    
    public function registrar_producto(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'nombre' => 'required|max_length[50]',
            'descripcion' => 'required|max_length[150]',
            'categoria' => 'required|is_not_unique[categorias.id_categoria]',
            'precio' => 'required|decimal',
            'cantidad' => 'required|integer',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]'
        ],
        [   //Errors
            'nombre' => [
                'required' => 'El nombre del producto es obligatorio.',
                'max_length' => 'El nombre no puede exceder los 50 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción del producto es obligatoria.',
                'max_length' => 'La descripción no puede exceder los 150 caracteres.'
            ],
            'categoria' => [
                'required' => 'La categoría del producto es obligatoria.',
                'is_not_unique' => 'La categoría seleccionada no existe.'
            ],
            'precio' => [
                'required' => 'El precio del producto es obligatorio.',
                'decimal' => 'El precio debe ser un número decimal válido.'
            ],
            'cantidad' => [
                'required' => 'La cantidad del producto es obligatoria.',
                'integer' => 'La cantidad debe ser un número entero.'
            ],
            'imagen' => [
                'uploaded' => 'Debe seleccionar una imagen para el producto.',
                'max_size' => 'La imagen no puede exceder los 4MB.',
                'is_image' => 'El archivo seleccionado debe ser una imagen válida.'
            ]
        ]);
        
        if($validation->withRequest($request)->run()){
            $img = $this->request->getFile('imagen');
            $imgName = $img->getRandomName();
            $img->move(ROOTPATH.'public/assets/upload', $imgName);
                
            $data = [
                'producto_descripcion' => $request->getPost('descripcion'),
                'producto_nombre' => $request->getPost('nombre'),
                'producto_categoria' => $request->getPost('categoria'),
                'producto_precio' => $request->getPost('precio'),
                'producto_cantidad' => $request->getPost('cantidad'),
                'producto_imagen' => $imgName,
                'producto_estado' => 1
            ];

            $producto = new Productos_model();
            $producto->insert($data);
            return redirect()->route('agregar')->with('mensaje', 'Producto agregado exitosamente!');
        } else {
            $categoria = new Categorias_model();
            $data['validation'] = $validation->getErrors();
            $data['producto_categoria'] = $categoria->findAll();
            $data['titulo'] = 'Agregar Producto';
            return view('plantillas/header_view', $data)
                .view('plantillas/nav_admin_view')
                .view('backend/agregar_producto_view');
        }
        
    }
    
    public function listar_productos(){
        $producto = new Productos_model();
        $categoria = new Categorias_model();
        $data['productos'] = $producto->join('categorias', 'categorias.id_categoria = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Gestionar Productos';
        return view('plantillas/header_view', $data)
            .view('plantillas/nav_admin_view')
            .view('backend/productos/listar_productos_view');
    }

    public function editar_producto($id=null){
        $producto = new Productos_model();
        $categoria = new Categorias_model();
        $data['categoria'] = $categoria->findAll();
        $data['producto'] = $producto->where('id_producto', $id)->first();
        $data['titulo'] = 'Editar Producto';

        return view('plantillas/header_view', $data)
            .view('plantillas/nav_admin_view', $data)
            .view('backend/productos/editar_producto_view');
    }

    public function actualizar_producto(){
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre' => 'required|max_length[50]',
            'descripcion' => 'required|max_length[150]',
            'categoria' => 'required|is_not_unique[categorias.id_categoria]',
            'precio' => 'required|decimal',
            'cantidad' => 'required|integer',
            'imagen' => 'max_size[imagen,4096]|is_image[imagen]'
        ],
        [   //Errors
            'nombre' => [
                'required' => 'El nombre del producto es obligatorio.',
                'max_length' => 'El nombre no puede exceder los 50 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción del producto es obligatoria.',
                'max_length' => 'La descripción no puede exceder los 150 caracteres.'
            ],
            'categoria' => [
                'required' => 'La categoría del producto es obligatoria.',
                'is_not_unique' => 'La categoría seleccionada no existe.'
            ],
            'precio' => [
                'required' => 'El precio del producto es obligatorio.',
                'decimal' => 'El precio debe ser un número decimal válido.'
            ],
            'cantidad' => [
                'required' => 'La cantidad del producto es obligatoria.',
                'integer' => 'La cantidad debe ser un número entero.'
            ],
            'imagen' => [
                'uploaded' => 'Debe seleccionar una imagen para el producto.',
                'max_size' => 'La imagen no puede exceder los 4MB.',
                'is_image' => 'El archivo seleccionado debe ser una imagen válida.'
            ]
        ]);
        
        if($validation->withRequest($request)->run()){
            $id = $request->getPost('id_producto');
            $data=[
                'producto_descripcion' => $request->getPost('descripcion'),
                'producto_nombre' => $request->getPost('nombre'),
                'producto_categoria' => $request->getPost('categoria'),
                'producto_precio' => $request->getPost('precio'),
                'producto_cantidad' => $request->getPost('cantidad')
            ];
                $producto = new Productos_model();
                $producto->update($id, $data);
                return redirect()->route('gestionar')->with('mensaje', 'Producto actualizado correctamente!');
        }else{
                       
            $validationErrors = $validation->getErrors();
            $producto = new Productos_model();
            $categoria = new Categorias_model();
            $data['validation'] = $validationErrors;
            $data['producto'] = $producto->where('id_producto', $request->getPost('id_producto'))->first();
            $data['categoria'] = $categoria->findAll();
            $data['titulo'] = 'Editar Producto';
            return view('plantillas/header_view', $data)
                .view('plantillas/nav_admin_view')
                .view('backend/productos/editar_producto_view');
        }
    }

    public function eliminar_producto($id = null){
        $data = ['producto_estado' => 0];
        $producto = new Productos_model();
        $producto->update($id, $data);
        return redirect()->route('gestionar')->with('mensaje', 'Producto desactivado correctamente!');
    }

    public function activar_producto($id = null){
        $data = array('producto_estado' => 1);
        $producto = new Productos_model();
        $producto->update($id, $data);
        return redirect()->route('gestionar')->with('mensaje', 'Producto desactivado correctamente!');
    }

    public function listar_productos_catalogo(){
        $producto = new Productos_model();
        $data['producto'] = $producto->where('producto_estado', 1)->where('producto_cantidad >', 0)
        ->join('categorias', 'categorias.id_categoria = productos.producto_categoria')->findAll();    
    
        $data['titulo'] = 'Catalogo de Productos';

        return view('plantillas/header_view', $data)
            .view('plantillas/nav_view')
            .view('frontend/catalogo_productos_view').view('plantillas/footer_view');
    }
}
