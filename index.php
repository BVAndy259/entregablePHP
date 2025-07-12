<?php
session_start();

$accion = $_GET['accion'] ?? 'login';
$modulo = $_GET['modulo'] ?? 'usuario';

switch ($modulo) {
    case 'usuario':
        require_once 'controller/UsuarioController.php';
        $controller = new UsuarioController();
        switch ($accion) {
            case 'login':
                // Mostrar formulario login
                require_once 'view/login.php';
                break;
            case 'validar':
                $controller->validar();
                break;
            case 'guardar':
                $controller->guardar();
                break;
        }
        break;
    
    case 'cliente':
        require_once 'controller/ClienteController.php';
        $controller = new ClienteController();
        switch ($accion) {
            case 'listar':
                $controller->cargar();
                break;
            case 'guardar':
                $controller->guardar();
                break;
        }
        break;
}
?>