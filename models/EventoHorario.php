<?php 

namespace Model;

class EventoHorario extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'categoria_id', 'ida_id', 'hora_id'];

    public $id;
    public $categoria_id;
    public $ida_id;
    public $hora_id;

    
}