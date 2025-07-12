<!DOCTYPE html>
<html>
<head>
    <title>Guardar Proyecto</title>
</head>
<body>
    <h1>Nuevo Proyecto</h1>
    <form action="index.php?modulo=proyecto&accion=guardar" method="POST">
        <input type="text" name="txtNom" placeholder="Nombre del Proyecto" required>
        <textarea name="txtDes" placeholder="Descripción"></textarea>
        <select name="txtEst">
            <option value="Pendiente">Pendiente</option>
            <option value="En progreso">En progreso</option>
            <option value="Completado">Completado</option>
        </select>
        <select name="txtIdCli" required>
            <option value="">Seleccionar Cliente</option>
            <?php foreach($clientes as $cliente): ?>
                <option value="<?= $cliente->getIdcliente() ?>">
                    <?= $cliente->getNombre() ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>