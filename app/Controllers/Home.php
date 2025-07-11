<?php

namespace App\Controllers;

use App\Models\Productos_model;
use App\Models\Categorias_model;

class Home extends BaseController
{
    public function index(): string
    {
        $producto = new Productos_model();
        $camisetas = $producto
            ->where('producto_estado', 1)
            ->where('producto_cantidad >', 0)
            ->where('producto_categoria', 2) 
            ->findAll();

        $data['camisetas'] = $camisetas;

        $botines = $producto
            ->where('producto_estado', 1)
            ->where('producto_cantidad >', 0)
            ->where('producto_categoria', 1) 
            ->findAll();
        
        $data['botines'] = $botines;

        $entrenamiento = $producto
            ->where('producto_estado', 1)
            ->where('producto_cantidad >', 0)
            ->where('producto_categoria', 3) 
            ->findAll();
        
        $data['entrenamiento'] = $entrenamiento;


        $data['titulo'] = "Inicio";

        return view('plantillas/nav_view', $data).view('frontend/inicio_view').view('plantillas/footer_view');
    }

    public function nosotros(): string
    {
        $data['titulo'] ="Nosotros";
        return view('plantillas/nav_view', $data).view('frontend/nosotros_view').view('plantillas/footer_view');
    } 

    public function contactate(): string
    {
        $data['titulo'] ="Contacto";
        return view('plantillas/nav_view', $data).view('frontend/contacto_view').view('plantillas/footer_view');
    } 

    public function medios_de_pagos(): string
    {
        $data['titulo'] ="Comercialización";
        return view('plantillas/nav_view', $data).view('frontend/comercializacion_view').view('plantillas/footer_view');
    }

    public function inicio_sesion(): string
    {
        $data['titulo'] ="Inicio de Sesion";
        return view('plantillas/nav_view', $data).view('frontend/inicio_sesion_view').view('plantillas/footer_view');
    }

    public function terminos(): string
    {
        $data['titulo'] ="Terminos y condiciones";
        return view('plantillas/nav_view', $data).view('frontend/terminos_view').view('plantillas/footer_view');
    }

    public function registrarse(): string
    {
        $data['titulo'] ="Registrarse";
        return view('plantillas/nav_view', $data).view('frontend/registrarse_view').view('plantillas/footer_view');
    }
}