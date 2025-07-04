<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use App\Models\Consultas_model;
use App\Models\Detalle_ventas_model;
use App\Models\Ventas_model;
use App\Models\Productos_model;

class Usuarios_controller extends BaseController
{
    public function add_consulta(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[50]',
                'telefono' => 'required|max_length[20]',
                'correo' => 'required|valid_email',
                'titulo' => 'required|max_length[50]',
                'consulta' => 'required|max_length[150]',
            ],
            [   //Errors
                'nombre' => [
                    'required' => 'El nombre es obligatorio.',
                    'max_length' => 'El nombre no puede exceder los 50 caracteres.'
                ],
                'telefono' => [
                    'required' => 'El teléfono es obligatorio.',
                    'max_length' => 'El teléfono no puede exceder los 20 caracteres.'
                ],
                'correo' => [
                    'required' => 'El correo es obligatorio.',
                    'valid_email' => 'El correo debe ser un correo electrónico válido.'
                ],
                'titulo' => [
                    'required' => 'El titulo de la consulta es obligatorio.',
                    'max_length' => 'El titulo de la consulta no puede exceder los 50 caracteres.'
                ],
                'consulta' => [
                    'required' => 'El motivo de la consulta es obligatorio.',
                    'max_length' => 'La consulta no puede exceder los 150 caracteres.'
                ]
            ]
        );
        if($validation->withRequest($request)->run()){
            
            $data =[
                'nombre_mensaje' => $request->getPost('nombre'),
                'telefono_mensaje' => $request->getPost('telefono'),
                'correo_mensaje' => $request->getPost('correo'),
                'titulo_mensaje' => $request->getPost('titulo'),
                'consulta_mensaje' => $request->getPost('consulta'),
                'estado_mensaje' => $request->getPost('estado') // 0 = No leído, 1 = Leído
            ];
            
            $consulta = new Consultas_model();
            $consulta->insert($data);
            
            return redirect()->route('contacto')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
        }else{
            $data['titulo']= 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/nav_view', $data).view('frontend/contacto_view').view('plantillas/footer_view');
        }
    }

    public function add_cliente(){
        $validation =\Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'apellidos' => 'required|max_length[30]',
            'nombres' => 'required|max_length[50]',
            'correo' => 'required|valid_email|is_unique[usuarios.correo_usuarios]',
            'contrasena' => 'required|min_length[8]',
            'repass' => 'required|matches[contrasena]'
        ],
        [   //Errors
            'apellidos' => [
                'required' => 'El apellido es obligatorio.',
                'max_length' => 'El apellido no puede exceder los 30 caracteres.'
            ],
            'nombres' => [
                'required' => 'El nombre es obligatorio.',
                'max_length' => 'El nombre no puede exceder los 50 caracteres.'
            ],
            'correo' => [
                'required' => 'El correo es obligatorio.',
                'valid_email' => 'El correo debe ser un formato válido.',
                'is_unique' => 'El correo ya está registrado.'
            ],
            'contrasena' => [
                'required' => 'La contraseña es obligatoria.',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
            ],
            'repass' => [
                'required' => 'Debe repetir su contraseña.',
                'matches' => "Las contraseñas no coinciden."
            ]
        ]
    );
    if($validation->withRequest($request)->run()){
        $data = [
            'nombre_usuarios' => $request->getPost('nombres'),
            'apellido_usuarios' => $request->getPost('apellidos'),
            'correo_usuarios' => $request->getPost('correo'),
            'telefono_usuarios' => $request->getPost('celular'),
            'contraseña_usuarios' => password_hash($request->getPost('contrasena'), PASSWORD_BCRYPT),
            'perfil_id' => 2, // Cliente
            'persona_estado' => 1 // Activo
        ];             
        $usuario = new Usuarios_model();
        $usuario->insert($data);
        return redirect()->route('registrarse')->with('mensaje_registro', 'Usuario registrado exitosamente!');   
    } else{
        $data['titulo'] = 'Registrarse';
        $data['validation'] = $validation->getErrors();
        
        return view('plantillas/nav_view', $data).view('frontend/registrarse_view').view('plantillas/footer_view');
        }
    }

    public function buscar_usuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();
        $validation->setRules([
            'correo' => 'required|valid_email',
            'contrasena' => 'required|min_length[8]'
        ],
        [   //Errors
            'correo' => [
                'required' => 'El correo es obligatorio.',
                'valid_email' => 'El correo debe ser un formato válido.'
            ],
            'contrasena' => [
                'required' => 'La contraseña es obligatoria.',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres.'
            ]
        ]);

        if(!$validation->withRequest($request)->run()){
            $data['titulo'] = 'Inicio de sesión';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/nav_view', $data).view('frontend/inicio_sesion_view').view('plantillas/footer_view');
        }
        $mail = $request->getPost('correo');
        $pass = $request->getPost('contrasena');

        $usuario = new Usuarios_model();
        $user = $usuario->where('correo_usuarios', $mail)->where('persona_estado', 1)->first();
        

        if(($user && password_verify($pass, $user['contraseña_usuarios'])) && $user['persona_estado'] == 1){
            $data = [
                'id' => $user['id_usuarios'],
                'nombre' => $user['nombre_usuarios'],
                'apellido' => $user['apellido_usuarios'],
                'correo' => $user['correo_usuarios'],
                'telefono' => $user['telefono_usuarios'],
                'perfil_id' => $user['perfil_id'],
                'login' => true,
            ];
            $session->set($data);
            switch ($user['perfil_id']) {
                case '1': // Admin
                    return redirect()->route('user_admin');
                    break;
                case '2': // Cliente
                    return redirect()->route('inicio');
                    break;
                }
            } else{
                return redirect()->route('inicio_sesion')->with('mensaje_error', 'Usuario y/o contraseña incorrectos!. O su usuario se encuentra inactivo.');
            }
        }      
    
    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->route('inicio');
    }

    public function actualizar_datos(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'nombre' => 'required|max_length[50]',
            'apellidos' => 'required|max_length[30]',
            'correo' => 'required|valid_email',
            'telefono' => 'max_length[20]',
            'dni' => 'max_length[10]|is_numeric|is_natural',
            'direccion' => 'max_length[50]'
        ],
        [   //Errors
            'nombre' => [
                'required' => 'El nombre es obligatorio.',
                'max_length' => 'El nombre no puede exceder los 50 caracteres.'
            ],
            'apellidos' => [
                'required' => 'El apellido es obligatorio.',
                'max_length' => 'El apellido no puede exceder los 30 caracteres.'
            ],
            'correo' => [
                'required' => 'El correo es obligatorio.',
                'valid_email' => 'El correo debe ser un formato válido.'
            ],
            'telefono' => [
                'max_length' => 'El teléfono no puede exceder los 20 caracteres.'
            ],
            'dni' => [
                'max_length' => 'El DNI no puede exceder los 10 caracteres.',
                'is_numeric' => 'El DNI debe ser numérico.',
                'is_natural' => 'El DNI no puede ser un número negativo.'
            ],
            'direccion' => [
                'max_length' => 'La dirección no puede exceder los 50 caracteres.'
            ]
        ]);
        if($validation->withRequest($request)->run()){
           $id = $request->getPost('id');
           $data=[
                'nombre_usuarios' => $request->getPost('nombre'),
                'apellido_usuarios' => $request->getPost('apellidos'),
                'correo_usuarios' => $request->getPost('correo'),
                'telefono_usuarios' => $request->getPost('telefono'),
                'dni_usuarios' => $request->getPost('dni')
            ];
            $usuario = new Usuarios_model();
            $usuario->update($id, $data);
            return redirect()->route('inicio');
        } else{
            $validationErrors = $validation->getErrors();
            $data['validation'] = $validationErrors;
            $usuario = new Usuarios_model();
            $data['usuario'] = $usuario->where('id_usuarios', session('id'))->first();
            $data['titulo'] = 'Perfil de usuario';
            return view('plantillas/nav_view', $data).view('frontend/perfil_view').view('plantillas/footer_view');
        }
    }

    public function perfil(){
        $data['titulo'] = 'Perfil de usuario';
        $usuario = new Usuarios_model();
        $data['usuario'] = $usuario->where('id_usuarios', session('id'))->first();
        return view('plantillas/nav_view', $data).view('frontend/perfil_view').view('plantillas/footer_view');
    }

    public function admin(){
        $data['titulo'] = 'Panel de administración';
        $usuario = new Usuarios_model();
        
        return view('plantillas/nav_admin_view', $data).view('backend/contenido_admin_view');
    }

    public function listar_consultas(){
        $consultas = new Consultas_model();

        $data['consultas_no_leidas'] = $consultas->where('estado_mensaje', 0)->findAll();
        $data['consultas_leidas'] = $consultas->where('estado_mensaje', 1)->findAll();

        $data['titulo'] = 'Consultas de usuarios';
        
        return view('plantillas/nav_admin_view', $data).view('backend/consultas_view');
    }

    public function leer($id = null){
        $data = ['estado_mensaje' => 1];
        $consultas = new Consultas_model();
        $consultas->update($id, $data);
        return redirect()->route('ver_consultas')->with('mensaje_consulta', 'Consulta marcada como leída!');
    }

    public function listar_compras(){
        $venta = new Ventas_model();
        $detalle = new Detalle_ventas_model();
        $producto = new Productos_model();

        $fecha_inicio = $this->request->getGet('fecha_inicio');
        $fecha_fin = $this->request->getGet('fecha_fin');
        
        $builder = $venta->where('cliente_id', session('id'));

        if ($fecha_inicio && $fecha_fin) {
            $builder = $builder->where('venta_fecha >=', $fecha_inicio)
                            ->where('venta_fecha <=', $fecha_fin);
        } elseif ($fecha_inicio) {
            $builder = $builder->where('venta_fecha >=', $fecha_inicio);
        } elseif ($fecha_fin) {
            $builder = $builder->where('venta_fecha <=', $fecha_fin);
        }
        
        $compras = $builder->orderBy('venta_fecha')->findAll();

        $idsVentas = array_column($compras, 'id_ventas');

        $detalle_ventas = [];
        if (!empty($idsVentas)) {
            $detalle_ventas = $detalle
                ->select('detalle_ventas.*, productos.producto_nombre, productos.producto_imagen')
                ->join('productos', 'productos.id_producto = detalle_ventas.producto_id')
                ->whereIn('venta_id', $idsVentas)
                ->findAll();
        }

        $data['filtros'] = [
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];

        $data['compras'] = $compras;
        $data['detalle_ventas'] = $detalle_ventas;
        $data['titulo'] = 'Mis Compras';
        return view('plantillas/nav_view', $data)
            .view('frontend/compras_view').view('plantillas/footer_view');
    }

    public function listar_usuarios(){
        $usuario = new Usuarios_model();
        $usuarios = $usuario
        ->select('usuarios.*, estados.estado_descripcion, perfil.perfil_descripcion')
        ->join('estados', 'estados.id_estado = usuarios.persona_estado')
        ->join('perfil', 'perfil.id_perfil = usuarios.perfil_id')
        ->findAll();
        $data['usuarios'] = $usuarios;
            $data['titulo'] = 'Usuarios registrados';
        
        return view('plantillas/nav_admin_view', $data).view('backend/usuarios_view');
    }

    public function activar_usuario($id = null){
        $data = ['persona_estado' => 1];
        $usuario = new Usuarios_model();
        $usuario->update($id, $data);
        return redirect()->route('ver_usuarios')->with('mensaje', 'Usuario activado exitosamente!');
    }

    public function desactivar_usuario($id = null){
        $data = ['persona_estado' => 0];
        $usuario = new Usuarios_model();
        $usuario->update($id, $data);
        return redirect()->route('ver_usuarios')->with('mensaje', 'Usuario desactivado exitosamente!');
    }
}