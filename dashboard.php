<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TecnoSoluciones</title>
</head>
<body>
    <div class="header">
        <h1>TecnoSoluciones S.A.</h1>
        <div class="user-info">
            <span>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?></span>
            <span>(<?php echo htmlspecialchars($usuario['rol']); ?>)</span>
            <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
        </div>
    </div>
    
    <div class="container">
        <div class="welcome">
            <h2>Panel de Control</h2>
            <p>Sistema de Gestión de Proyectos y Clientes</p>
        </div>
        
        <div class="dashboard-grid">
            <div class="card">
                <h3>Gestión de Clientes</h3>
                <p>Administra la información de tus clientes</p>
                <a href="clientes.php" class="btn">Ver Clientes</a>
                <a href="clientes.php?action=nuevo" class="btn btn-success">Nuevo Cliente</a>
            </div>
            
            <div class="card">
                <h3>Gestión de Proyectos</h3>
                <p>Controla el estado de tus proyectos</p>
                <a href="proyectos.php" class="btn">Ver Proyectos</a>
                <a href="proyectos.php?action=nuevo" class="btn btn-success">Nuevo Proyecto</a>
            </div>
            
            <div class="card">
                <h3>Reportes</h3>
                <p>Genera reportes en PDF</p>
                <a href="reportes.php" class="btn">Generar Reportes</a>
            </div>
            
            <?php if ($usuario['rol'] == 'admin'): ?>
            <div class="card">
                <h3>Administración</h3>
                <p>Gestión de usuarios (Solo Admin)</p>
                <a href="usuarios.php" class="btn">Gestionar Usuarios</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>