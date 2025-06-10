<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('inicio', 'Home::index');

$routes->get('nosotros', 'Home::nosotros');

$routes->get('contacto', 'Home::contactate');

$routes->get('comercializacion', 'Home::medios_de_pagos');

$routes->get('camisetas', 'Home::camisetas');

$routes->get('botines', 'Home::botines');

$routes->get('entrenamiento', 'Home::entrenamiento');

$routes->get('inicio_sesion', 'Home::inicio_sesion');;

$routes->get('terminos', 'Home::terminos');;

$routes->get('registrarse', 'Home::registrarse');

$routes->post('registro_usuario', 'usuarios_controller::add_cliente');
$routes->post('consulta_usuario', 'usuarios_controller::add_consulta');