<?php

namespace Model;

class Cliente extends ActiveRecord{
    public static $tabla = 'clientes';
    public static $columnasDB = ['cliente_nombre','cliente_nit','cliente_situacion'];
    public static $idTabla = 'cliente_id';

    public $cliente_id;
    public $cliente_nombre;
    public $cliente_nit;
    public $cliente_situacion;

    public function __construct($args =[])
    {
        $this->cliente_id = $args['cliente_id'] ?? null;
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_nit = $args['cliente_nit'] ?? '';
        $this->cliente_situacion = $args['cliente_situacion'] ?? '1';
    }

}