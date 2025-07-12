<?php
// Configuración de sesiones para evitar problemas de permisos
$session_path = __DIR__ . '/../sessions';

// Crear carpeta sessions si no existe
if (!is_dir($session_path)) {
    mkdir($session_path, 0777, true);
}

// Configurar la ruta de sesiones
ini_set('session.save_path', $session_path);

// Iniciar sesión de forma segura
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>