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

$routes->get('editar/(:num)', 'Productos_controller::editar_producto/$1');

$routes->post('actualizar', 'Productos_controller::actualizar_producto');

$routes->get('eliminar/(:num)', 'Productos_controller::eliminar_producto/$1');

$routes->get('activar/(:num)', 'Productos_controller::activar_producto/$1');

$routes->get('catalogo', 'Productos_controller::listar_productos_catalogo');

$routes->post('agregar_al_carrito', 'Cart_controller::agregar_carrito');

$routes->get('ver_carrito', 'Cart_controller::ver_carrito');

$routes->get('ventas', 'Cart_controller::guardar_venta');

$routes->get('eliminar_carrito/(:any)', 'Cart_controller::eliminar_item/$1');

$routes->get('ver_consultas', 'Usuarios_controller::listar_consultas');

$routes->get('ver_ventas', 'Cart_controller::listar_ventas');

$routes->get('vaciar_carrito', 'Cart_controller::limpiar_carrito');