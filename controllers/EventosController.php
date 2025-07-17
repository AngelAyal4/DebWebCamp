<?php

namespace Controllers;

use MVC\Router;
use Model\Categoria;
use Model\Dia;
use Model\Hora;

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



        // Render a la vista 
        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas
        ]);
    }

}