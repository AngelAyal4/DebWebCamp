<?php

namespace Controllers;

class APIEventos {

    public static function index(){
        $dia_id = $_GET['dia_id'] ?? '';
        $categoria_id = $_GET['categoria_id'] ?? '';

        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);

        if(!$dia_id || !$categoria_id) {
            echo json_encode([]);
            return;
        }

        $eventos = EventoHorario::whereArray(['ida_id' => $dia_id, 'categoria_id' => $categoria_id]);

        echo json_encode($eventos);
    }
}
