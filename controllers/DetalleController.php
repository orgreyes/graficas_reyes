<?php

namespace Controllers;

use Exception;
use Model\Detalle;
use MVC\Router;

class DetalleController {
    public static function estadistica(Router $router) {
        $detalles = Detalle::all();
    
        $router->render('productos/estadisticas', [
            'detalles' => $detalles,
        ]);
    }
    

        //!Funcion DetalleVentas
        public static function detalleVentasAPI()
        {
    
            $sql = " SELECT producto_nombre AS producto, SUM(detalle_cantidad) AS cantidad 
            FROM detalle_ventas 
            INNER JOIN productos ON detalle_producto = producto_id 
            WHERE detalle_situacion = 1 GROUP BY producto_nombre
             ";
            

            try {
    
                $productos = Detalle::fetchArray($sql);
    
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