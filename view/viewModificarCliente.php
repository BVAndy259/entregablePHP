<!DOCTYPE html>
<html>
<head>
    <title>Modificar Cliente</title>
</head>
<body>
    <h1>Modificar Cliente</h1>
    <form action="index.php?modulo=cliente&accion=modificar" method="POST">
        <input type="hidden" name="txtId" value="<?= $cliente->getIdcliente() ?>">
        <input type="text" name="txtNom" value="<?= $cliente->getNombre() ?>" required>
        <input type="text" name="txtRuc" value="<?= $cliente->getRuc() ?>" required>
        <input type="email" name="txtEma" value="<?= $cliente->getEmail() ?>" required>
        <input type="text" name="txtTel" value="<?= $cliente->getTelefono() ?>" required>
        <input type="text" name="txtRep" value="<?= $cliente->getRepresentante() ?>" required>
        <button type="submit">Modificar</button>
    </form>
</body>
</html>