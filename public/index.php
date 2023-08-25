<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\LoginController;
use Controllers\ProductoController;
use Controllers\ClienteController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [LoginController::class,'index']);
$router->get('/menu', [LoginController::class,'menu']);
$router->get('/logout', [LoginController::class,'logout']);
$router->post('/API/login', [LoginController::class,'loginAPI']);

//!Rutas de Productos
$router->get('/productos/datatable', [ProductoController::class,'datatable']);
$router->get('/API/productos/buscar', [ProductoController::class,'buscarAPI']);
$router->post('/API/productos/guardar', [ProductoController::class,'guardarAPI']);
$router->post('/API/productos/eliminar', [ProductoController::class,'eliminarAPI']);
$router->post('/API/productos/modificar', [ProductoController::class,'modificarAPI']);

//!Rutas de Clientes
$router->get('/clientes/datatable', [ClienteController::class,'datatable']);
$router->get('/API/clientes/buscar', [ClienteController::class,'buscarAPI']);
$router->post('/API/clientes/guardar', [ClienteController::class,'guardarAPI']);
$router->post('/API/clientes/eliminar', [ClienteController::class,'eliminarAPI']);
$router->post('/API/clientes/modificar', [ClienteController::class,'modificarAPI']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
