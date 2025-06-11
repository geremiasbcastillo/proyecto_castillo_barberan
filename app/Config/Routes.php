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

$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');
$routes->post('consulta_usuario', 'Usuarios_controller::add_consulta');

$routes->get('login_cliente', 'Usuarios_controller::login');

$routes->post('verificar_usuario', 'Usuarios_controller::buscar_usuario');

$routes->get('logout', 'Usuarios_controller::cerrar_sesion');

$routes->get('user_admin', 'Usuarios_controller::admin');

$routes->get('agregar', 'Productos_controller::agregar_producto');

$routes->post('agregar_producto', 'Productos_controller::registrar_producto');

$routes->get('gestionar', 'Productos_controller::listar_productos');

$routes->get('editar_producto/(:num)', 'Productos_controller::editar_producto/$1');

$routes->post('actualizar', 'Productos_controller::actualizar_producto');