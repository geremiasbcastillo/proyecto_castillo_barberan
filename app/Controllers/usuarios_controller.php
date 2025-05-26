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

            return redirect()->route('contact')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
        }else{
            $data['titulo']= 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/encabezado', $data).view('plantillas/nav').view('contenido/contacto_view').view('plantillas/footer.php');
        }
    }
}