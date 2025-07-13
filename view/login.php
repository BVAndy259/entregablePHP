<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION['error_login'])) {
        echo "<p style='color:red'>" . $_SESSION['error_login'] . "</p>";
        unset($_SESSION['error_login']);
    }
    ?>

    <form method="POST" action="index.php?action=validar">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
