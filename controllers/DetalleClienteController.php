<?php

namespace Controllers;

use Exception;
use Model\Detalle;
use MVC\Router;

class DetalleClienteController {
    public static function estadistica(Router $router) {
        $detalles = Detalle::all();
    
        $router->render('clientes/estadisticas', [
            'detalles' => $detalles,
        ]);
    }
    

        //!Funcion DetalleCompras
        public static function detalleComprasAPI()
        {
    
            $sql = " SELECT c.cliente_nombre AS cliente, COUNT(v.venta_id) AS cantidad_ventas
            FROM clientes c
            LEFT JOIN ventas v ON c.cliente_id = v.venta_cliente AND v.venta_situacion = '1'
            GROUP BY c.cliente_id, c.cliente_nombre
            ORDER BY c.cliente_id;
             ";
            

            try {
    
                $clientes = Detalle::fetchArray($sql);
    
                echo json_encode($clientes);
            } catch (Exception $e) {
                echo json_encode([
                    'detalle' => $e->getMessage(),
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
        }

}


