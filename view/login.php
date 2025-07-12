<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="index.php?modulo=usuario&accion=validar" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>