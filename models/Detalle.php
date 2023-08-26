<?php

namespace Model;

class Detalle extends ActiveRecord{
    public static $tabla = 'detalle_ventas';
    public static $columnasDB = ['detalle_venta','detalle_producto','detalle_cantidad', 'detalle_situacion'];
    public static $idTabla = 'detalle_id';

    public $detalle_id;
    public $detalle_venta;
    public $detalle_producto;
    public $detalle_cantidad;
    public $detalle_situacion;

    public function __construct($args =[])
    {
        $this->detalle_id = $args['detalle_id'] ?? null;
        $this->detalle_venta = $args['detalle_venta'] ?? '';
        $this->detalle_producto = $args['detalle_producto'] ?? '';
        $this->detalle_cantidad = $args['detalle_cantidad'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    
}
