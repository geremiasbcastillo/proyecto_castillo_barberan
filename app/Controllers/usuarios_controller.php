<?php

namespace APP\Controllers;

use App\Models\usuarios_model;
use App\Models\Consultas_model;

class usuarios_controller extends BaseController
{
    public function add_consulta(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[50]',
                'telefono' => 'required|max_length[20]',
                'correo' => 'required|valid_email',
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
                'consulta_mensaje' => $request->getPost('consulta')
            ];
            
            $consulta = new Consultas_model();
            $consulta->insert($data);
            
            return redirect()->route('contacto')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
        }else{
            $data['titulo']= 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/header_view', $data).view('plantillas/nav_view').view('contenido/contacto_view').view('plantillas/footer_view');
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
                'is_Unique' => 'El correo ya está registrado.'
            ],
            'celular' => [
                'required' => 'El número de celular es obligatorio.',
                'max_length' => 'El número de celular no puede exceder los 20 caracteres.'
            ],
            'contrasena' => [
                'required' => 'La contraseña es obligatoria.',
                  'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
            ],
            'repetir_contrasena' => [
                'required' => 'Debe repetir su contraseña.',
                'matches' => "Las contraseñas no coinciden."
            ]
        ]
    );
    if($validation->withRequest($request)->run()){
        $data = [
            'apellido_usuarios' => $request->getPost('apellidos'),
            'nombre_usuarios' => $request->getPost('nombres'),
            'correo_usuarios' => $request->getPost('correo'),
            'telefono_usuarios' => $request->getPost('celular'),
            'contraseña_usuarios' => password_hash($request->getPost('contrasena'), PASSWORD_BCRYPT),
            'perfil_id' => 2, // Cliente
            'persona_estado' => 1 // Activo
        ];             
        $usuario = new usuarios_model();
        $usuario->insert($data);
        return redirect()->route('registrarse')->with('mensaje_registro', 'Usuario registrado exitosamente!');   
    } else{
        $data['titulo'] = 'Registrarse';
        $data['validation'] = $validation->getErrors();
        
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('contenido/registrarse_view').view('plantillas/footer_view');
    }
}
}