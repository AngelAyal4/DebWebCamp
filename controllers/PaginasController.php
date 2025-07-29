<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);

    }
    public static function evento(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/index', [
            'titulo' => 'Sobre WebDevCamp'
        ]);

    }

    public static function paquetes(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/index', [
            'titulo' => 'Paquetes WebDevCamp'
        ]);

    }
    public static function conferencias(Router $router) {

        // Render a la vista de inicio
        $router->render('paginas/index', [
            'titulo' => 'Conferencias & Workshops'
        ]);

    }
}