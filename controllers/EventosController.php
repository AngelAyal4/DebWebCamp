<?php

namespace Controllers;

use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Hora;
use Model\Evento;

class EventosController {

    public static function index(Router $router){
        // Render a la vista 
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias / Workshops',
        ]);
    }

    public static function crear(Router $router){
        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);

            // Validar los datos
            $alertas = $evento->validar();

            if(empty($alertas)) {
                // Guardar el evento
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }



        // Render a la vista 
        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

}