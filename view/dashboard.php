<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?= $_SESSION['nombre'] ?></h1>
    <?php include 'view/menu.php'; ?>
</body>
</html>