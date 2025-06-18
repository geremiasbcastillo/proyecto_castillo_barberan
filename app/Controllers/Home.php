<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
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

    public function camisetas(): string
    {
        $data['titulo'] ="Camisetas";
        return view('plantillas/nav_view', $data).view('frontend/camisetas_view').view('plantillas/footer_view');
    }

    public function botines(): string
    {
        $data['titulo'] ="Botines";
        return view('plantillas/nav_view', $data).view('frontend/botines_view').view('plantillas/footer_view');
    }

    public function entrenamiento(): string
    {
        $data['titulo'] ="Entrenamiento";
        return view('plantillas/nav_view', $data).view('frontend/entrenamiento_view').view('plantillas/footer_view');
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