<?php
    require_once __DIR__ . '/controller/ClienteController.php';

    $action = $_GET['action'] ?? 'cargar';
    $controller = new ClienteController();

    switch($action) {
        case 'cargar':
            $controller->cargar();
            break;
        case 'guardar':
            $controller->guardar();
            break;
        case 'modificar':
            $controller->modificar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;
        default:
            $controller->cargar();
            break;
    }
?>