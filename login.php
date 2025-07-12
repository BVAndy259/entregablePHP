<?php
require_once 'config/session.php';

// Verificar si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Incluir el controlador
    require_once 'controller/UsuarioController.php';
    
    // Crear instancia del controlador
    $usuarioController = new UsuarioController();
    
    // Intentar hacer login
    $resultado = $usuarioController->login($email, $password);
    
    if ($resultado['success']) {
        // Login exitoso
        header('Location: ' . $resultado['redirect']);
        exit();
    } else {
        // Login fallido
        $_SESSION['error'] = $resultado['message'];
        header('Location: index.php');
        exit();
    }
} else {
    // Si no es POST, redirigir al login
    header('Location: index.php');
    exit();
}
?>