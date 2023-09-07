<?php
namespace Model;

class  Cliente extends ActiveRecord{
    protected static $tabla = 'marcador';
    protected static $columnasDB = ['mar_nombre','mar_latitud', 'mar_longitud', 'mar_situacion'];
    protected static $idTabla = 'mar_id';


    public $mar_id
;
    public $mar_nombre;
    public $mar_latitud;
    public $mar_longitud;
    public $mar_situacion;
    
    public function __construct($args =[])
    {
        $this->mar_id = $args['mar_id'] ?? null;
        $this->mar_nombre = $args['mar_nombre'] ?? '';
        $this->mar_latitud = $args['mar_latitud'] ?? '';
        $this->mar_longitud = $args['mar_longitud'] ?? '';
        $this->mar_situacion = $args['mar_situacion'] ?? '1';
        
    }
}

?>