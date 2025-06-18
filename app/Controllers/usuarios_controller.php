<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use App\Models\Consultas_model;

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
                'consulta_mensaje' => $request->getPost('consulta')
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
            'celular' => 'required|max_length[20]',
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
            'celular' => [
                'required' => 'El número de celular es obligatorio.',
                'max_length' => 'El número de celular no puede exceder los 20 caracteres.'
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
            return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/inicio_sesion_view').view('plantillas/footer_view');
        }
        $mail = $request->getPost('correo');
        $pass = $request->getPost('contrasena');

        $usuario = new Usuarios_model();
        $user = $usuario->where('correo_usuarios', $mail)->where('persona_estado', 1)->first();
        

        if($user && password_verify($pass, $user['contraseña_usuarios'])){
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
                return redirect()->route('inicio_sesion')->with('mensaje_error', 'Usuario y/o contraseña incorrectos!.');
            }
        }      
    
    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->route('inicio');
    }

    public function admin(){
        $data['titulo'] = 'Panel de administración';
        
        return view('plantillas/nav_admin_view', $data).view('backend/contenido_admin_view');
    }

    public function listar_consultas(){
        $consultas = new Consultas_model();
        $data['consultas'] = $consultas->findAll();
        $data['titulo'] = 'Consultas de usuarios';
        
        return view('plantillas/nav_admin_view', $data).view('backend/consultas_view');
    }
}