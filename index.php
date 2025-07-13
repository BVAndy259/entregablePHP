<?php
require_once __DIR__ . '/controller/UsuarioController.php';

session_start();

$action = $_GET['action'] ?? 'formulario';

$controller = new UsuarioController();

switch ($action) {
    case 'validar':
        $controller->validar();
        break;

    case 'guardar':
        $controller->guardar();
        break;

    case 'formulario':
    default:
        require_once __DIR__ . '/view/login.php';
        break;
}
?>