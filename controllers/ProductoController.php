<?php

namespace Controllers;

use Exception;
use Model\Producto;
use MVC\Router;

class ProductoController {
    public static function datatable(Router $router){
        $router->render('productos/datatable', []);
    }

    public static function buscarAPI(){
        $producto_nombre = $_GET['producto_nombre'];
        $producto_precio = $_GET['producto_precio'];

        $sql = "SELECT * FROM productos where producto_situacion = 1 ";
        if($producto_nombre != '') {
            $sql.= " and producto_nombre like '%$producto_nombre%' ";
        }
        if($producto_precio != '') {
            $sql.= " and producto_precio = $producto_precio ";
        }
        try {
            
            $productos = Producto::fetchArray($sql);
    
            echo json_encode($productos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

}