<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Usuario;   // <-- Agrega esta línea
use Model\Paquete;   // <-- Y esta línea

class RegistroController {

    public static function crear(Router $router){
        if(!is_auth()) {
            header('Location: /login');
            return;
        }

        //Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);
        if(isset($registro) && $registro->paquete_id === "3") {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;

        }

        // Render a la vista 
        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro',
        ]);
    }

    public static function gratis(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login'); 
                return;
            }

            if(isset($registro) && $registro->paquete_id === "3") {
            header('Location: /boleto?id=' . urlencode($registro->token));
            return;

        }

            // Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if(isset($registro) && $registro->paquete_id === "3") {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }

            $token = substr( md5(uniqid( rand(), true )), 0, 8);
            
            // Crear registro
            $datos = [
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            ];

            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
                return;
            }

        }
    }

    public static function pagar(Router $router) {

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(!is_auth()) {
                    header('Location: /login');
                    return;
                }

                // Validar que Post no venga vacio
                if(empty($_POST)) {
                    echo json_encode([]);
                    return;
                }

                // Crear el registro
                $datos = $_POST;
                $datos['token'] = substr( md5(uniqid( rand(), true )), 0, 8);
                $datos['usuario_id'] = $_SESSION['id'];
                
                try {
                    $registro = new Registro($datos);
            
                    $resultado = $registro->guardar();
                    echo json_encode($resultado);
                } catch (\Throwable $th) {
                    echo json_encode([
                        'resultado' => 'error'
                    ]);
                }

            }
        }

    public static function boleto(Router $router) {

        // Validar la URL
        $id = $_GET['id'];

        if(!$id || !strlen($id) === 8 ) {
            header('Location: /');
            return;
        }

        // buscarlo en la BD
        $registro = Registro::where('token', $id);
        if(!$registro) {
            header('Location: /');
            return;
        }
        // Llenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }

}