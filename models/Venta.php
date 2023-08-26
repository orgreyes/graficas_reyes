<?php

namespace Model;

class Venta extends ActiveRecord{
    public static $tabla = 'ventas';
    public static $columnasDB = ['venta_cliente','venta_fecha','venta_situacion'];
    public static $idTabla = 'venta_id';

    public $venta_id;
    public $venta_cliente;
    public $venta_fecha;
    public $venta_situacion;

    public function __construct($args =[])
    {
        $this->venta_id = $args['venta_id'] ?? null;
        $this->venta_cliente = $args['venta_cliente'] ?? '';
        $this->venta_fecha = $args['venta_fecha'] ?? '';
        $this->venta_situacion = $args['venta_situacion'] ?? '1';
    }

    
}

