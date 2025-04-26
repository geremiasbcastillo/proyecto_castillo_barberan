<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['titulo'] = "Inicio";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/inicio_view').view('plantillas/footer_view');
    }

    public function nosotros(): string
    {
        $data['titulo'] ="Nosotros";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/nosotros_view').view('plantillas/footer_view');
    } 

    public function contactate(): string
    {
        $data['titulo'] ="Contacto";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/contacto_view').view('plantillas/footer_view');
    } 

    public function medios_de_pagos(): string
    {
        $data['titulo'] ="Comercialización";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/comercializacion_view').view('plantillas/footer_view');
    }

    public function camisetas(): string
    {
        $data['titulo'] ="Camisetas";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/camisetas_view').view('plantillas/footer_view');
    }

    public function botines(): string
    {
        $data['titulo'] ="Botines";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/botines_view').view('plantillas/footer_view');
    }

    public function entrenamiento(): string
    {
        $data['titulo'] ="Entrenamiento";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/entrenamiento_view').view('plantillas/footer_view');
    }

    public function inicio_sesion(): string
    {
        $data['titulo'] ="Inicio de Sesion";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/inicio_sesion_view').view('plantillas/footer_view');
    }
}