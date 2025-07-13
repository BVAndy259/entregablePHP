<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tecnosoluciones</a>
            <div class="collapse navbar-collapse justify-content-end">
                <span class="navbar-text text-white me-3">
                    Bienvenido, <?= htmlspecialchars($nombre) ?> (<?= htmlspecialchars($rol) ?>)
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Menú Principal</h2>
            <p class="text-muted">Seleccione una opción para comenzar</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="list-group shadow rounded">
                    <a href="indexClientes.php" class="list-group-item list-group-item-action">
                        🧾 Mantenimiento de Clientes
                    </a>
                    <a href="indexProyectos.php" class="list-group-item list-group-item-action">
                        🏗️ Mantenimiento de Proyectos
                    </a>
                    <a href="indexReportes.php" class="list-group-item list-group-item-action">
                        📊 Ver Reportes
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

