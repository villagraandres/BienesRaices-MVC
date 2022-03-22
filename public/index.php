<?php

require_once __DIR__.'/../includes/app.php';

use Controllers\BlogController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
$router= new Router();



//propiedades
$router->get('/admin',[PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'eliminar']);


//vendedores
$router->get('/vendedor/crear',[VendedorController::class,'crear']);
$router->post('/vendedor/crear',[VendedorController::class,'crear']);
$router->get('/vendedor/actualizar',[VendedorController::class,'actualizar']);
$router->post('/vendedor/actualizar',[VendedorController::class,'actualizar']);
$router->post('/vendedor/eliminar',[VendedorController::class,'eliminar']);

//Blog
$router->get('/blog/crear',[BlogController::class,'crear']);
$router->post('/blog/crear',[BlogController::class,'crear']);
$router->get('/blog/actualizar',[BlogController::class,'actualizar']);
$router->post('/blog/actualizar',[BlogController::class,'actualizar']);
$router->post('/blog/eliminar',[BlogController::class,'eliminar']);
$router->get('/blog/ver',[BlogController::class,'ver']);



$router->get('/',[PaginasController::class,'index']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/propiedades',[PaginasController::class,'propiedades']);
$router->get('/propiedad',[PaginasController::class,'propiedad']);
$router->get('/blog',[PaginasController::class,'blog']);
$router->get('/entrada',[PaginasController::class,'entrada']);
$router->get('/contacto',[PaginasController::class,'contacto']);
$router->post('/contacto',[PaginasController::class,'contacto']);


$router->comprobarURL();
