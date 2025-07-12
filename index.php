<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoSoluciones - Sistema de Gestión</title>
</head>
<body>
    <div>
        <h1>TecnoSoluciones S.A.</h1>
        <h2>Sistema de Gestión de Proyectos</h2>
        
        <?php
        // Verificar si ya está logueado
        if (isset($_SESSION['usuario'])) {
            header('Location: dashboard.php');
            exit();
        }
        
        // Mostrar mensaje de error si existe
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <p">
            <small>Usuarios de prueba:<br>
            juan@email.com / juan123<br>
            maria@email.com / maria123</small>
        </p>
    </div>
</body>
</html>