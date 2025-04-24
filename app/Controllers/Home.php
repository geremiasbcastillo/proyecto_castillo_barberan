<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['titulo'] = "Inicio";$data['titulo'] ="Inicio";
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
        return view('plantillas/nav_view', $data).view('frontend/nosotros_view').view('plantillas/footer_view');
    } 

    public function medios_de_pagos(): string
    {
        $data['titulo'] ="Medios de Pago";
        return view('plantillas/header_view', $data).view('plantillas/nav_view').view('frontend/contacto_view').view('plantillas/footer_view');
        return view('plantillas/nav_view', $data).view('frontend/nosotros_view').view('plantillas/footer_view');
    } 
}