<?php
session_start();

// Redirigir si no ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    header("Location: index.php");
    exit();
}

// Datos del usuario
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol']; // Puedes usar esto para mostrar distintas opciones por rol si deseas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($nombre) ?> 👋</h1>

    <h2>Menú Principal</h2>
    <ul>
        <li><a href="indexClientes.php">👥 Mantenimiento de Clientes</a></li>
        <li><a href="indexProyectos.php">📁 Mantenimiento de Proyectos</a></li>
        <li><a href="indexReportes.php">📊 Ver Reportes</a></li>
        <li><a href="logout.php">🚪 Cerrar Sesión</a></li>
    </ul>
</body>
</html>
