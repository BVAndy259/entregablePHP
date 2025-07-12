<!DOCTYPE html>
<html>
<head>
    <title>Guardar Cliente</title>
</head>
<body>
    <h1>Nuevo Cliente</h1>
    <form action="index.php?modulo=cliente&accion=guardar" method="POST">
        <input type="text" name="txtNom" placeholder="Nombre" required>
        <input type="text" name="txtRuc" placeholder="RUC" required>
        <input type="email" name="txtEma" placeholder="Email" required>
        <input type="text" name="txtTel" placeholder="Teléfono" required>
        <input type="text" name="txtRep" placeholder="Representante" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>