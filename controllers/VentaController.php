<?php

namespace Controllers;

use Exception;
use Model\Venta;
use MVC\Router;

class VentaController {
    public static function datatable(Router $router){

        $ventas = Venta::all();

        $router->render('ventas/datatable', [
            'ventas' => $ventas,
        ]);
    }


    //!Funcion guardar
    public static function guardarAPI(){
        try {
            $venta = new Venta($_POST);
            $resultado = $venta->crear();
            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
                // echo json_encode($resultado);
                // exit;
            }
            
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
        ]);
        }
    }


    //!Funcion Buscar
    public static function buscarAPI()
    {
        $venta_cliente = $_GET['venta_cliente'] ?? '';
        $venta_fecha = $_GET['venta_fecha'] ?? '';

        $sql = "SELECT cliente_nombre, venta_fecha 
                FROM ventas 
                inner join clientes on cliente_id = venta_cliente
                WHERE venta_situacion = 1 ";
        if ($venta_cliente != '') {
            $venta_cliente = strtolower($venta_cliente);
            $sql .= " AND LOWER(venta_cliente) LIKE '%$venta_cliente%' ";
        }
        if ($venta_fecha != '') {
            $venta_fecha = strtolower($venta_fecha);
            $sql .= " AND prod$venta_fecha= '$venta_fecha' ";
        }

        try {

            $ventas = Venta::fetchArray($sql);

            echo json_encode($ventas);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }


    public static function modificarAPI(){
        try{
            $venta = new Venta($_POST);
            $resultado = $venta->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
            }
        }catch(Exception $e){
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
        ]);
        }
    }

    public static function eliminarAPI(){
        try{
            $venta_id = $_POST['venta_id'];
            $venta = Venta::find($venta_id);
            $venta->venta_situacion = 0;
            $resultado = $venta->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                ]);
            }
        }catch(Exception $e){
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje'=> 'Ocurrio un Error',
                'codigo' => 0
        ]);
        }
    }
}