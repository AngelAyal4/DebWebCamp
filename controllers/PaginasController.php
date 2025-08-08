<?php

namespace Controllers;

use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Model\Ponente;
use Model\Dia;
use Model\Hora;

class PaginasController {
    public static function index(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);

    }
    public static function evento(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre WebDevCamp'
        ]);

    }

    public static function paquetes(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes WebDevCamp'
        ]);

    }
    public static function conferencias(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];

        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if($evento->dia_id === '1' && $evento->categoria_id === '1'){
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === '1' && $evento->categoria_id === '2'){
                $eventos_formateados['workshops_v'][] = $evento;
            }

            if($evento->dia_id === '2' && $evento->categoria_id === '1'){
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === '2' && $evento->categoria_id === '2'){
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Render a la vista de inicio
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);

    }
}