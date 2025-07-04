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

$routes->get('terminos', 'Home::terminos');;

$routes->post('consulta_usuario', 'Usuarios_controller::add_consulta');

$routes->get('catalogo', 'Productos_controller::listar_productos_catalogo');



$routes->post('agregar_al_carrito', 'Cart_controller::agregar_carrito', ['filter' => 'user']);

$routes->get('ver_carrito', 'Cart_controller::ver_carrito', ['filter' => 'user']);

$routes->get('vaciar_carrito', 'Cart_controller::limpiar_carrito', ['filter' => 'user']);

$routes->get('ventas', 'Cart_controller::guardar_venta', ['filter' => 'user']);

$routes->post('actualizar_carrito', 'Cart_controller::actualizar_carrito', ['filter' => 'user']);




$routes->get('perfil', 'Usuarios_controller::perfil', ['filter' => 'user']);

$routes->post('actualizar_perfil', 'Usuarios_controller::actualizar_datos', ['filter' => 'user']);

$routes->get('ver_compras', 'Usuarios_controller::listar_compras', ['filter' => 'user']);





$routes->get('inicio_sesion', 'Home::inicio_sesion', ['filter' => 'guest']);

$routes->post('verificar_usuario', 'Usuarios_controller::buscar_usuario');

$routes->get('registrarse', 'Home::registrarse', ['filter' => 'guest']);

$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');

$routes->get('logout', 'Usuarios_controller::cerrar_sesion', ['filter' => 'auth']);

$routes->get('user_admin', 'Usuarios_controller::admin', ['filter' => 'admin']);




$routes->get('agregar', 'Productos_controller::agregar_producto', ['filter' => 'admin']);

$routes->post('agregar_producto', 'Productos_controller::registrar_producto', ['filter' => 'admin']);

$routes->get('gestionar', 'Productos_controller::listar_productos', ['filter' => 'admin']);

$routes->get('editar/(:num)', 'Productos_controller::editar_producto/$1', ['filter' => 'admin']);

$routes->post('actualizar', 'Productos_controller::actualizar_producto', ['filter' => 'admin']);

$routes->get('eliminar/(:num)', 'Productos_controller::eliminar_producto/$1', ['filter' => 'admin']);

$routes->get('activar/(:num)', 'Productos_controller::activar_producto/$1', ['filter' => 'admin']);

$routes->get('eliminar_carrito/(:any)', 'Cart_controller::eliminar_item/$1', ['filter' => 'admin']);

$routes->get('ver_consultas', 'Usuarios_controller::listar_consultas', ['filter' => 'admin']);

$routes->get('ver_ventas', 'Cart_controller::listar_ventas', ['filter' => 'admin']);

$routes->get('marcar_leido/(:num)', 'Usuarios_controller::leer/$1', ['filter' => 'admin']);

$routes->get('ver_usuarios', 'Usuarios_controller::listar_usuarios', ['filter' => 'admin']);

$routes->get('activar_usuario/(:num)', 'Usuarios_controller::activar_usuario/$1', ['filter' => 'admin']);

$routes->get('desactivar_usuario/(:num)', 'Usuarios_controller::desactivar_usuario/$1', ['filter' => 'admin']);

