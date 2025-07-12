<!DOCTYPE html>
<html>
<head>
    <title>Modificar Proyecto</title>
</head>
<body>
    <h1>Modificar Proyecto</h1>
    <form action="index.php?modulo=proyecto&accion=modificar" method="POST">
        <input type="hidden" name="txtId" value="<?= $proyecto->getIdproyecto() ?>">
        <input type="text" name="txtNom" value="<?= $proyecto->getNombre() ?>" required>
        <textarea name="txtDes"><?= $proyecto->getDescripcion() ?></textarea>
        <select name="txtEst">
            <option value="Pendiente" <?= $proyecto->getEstado() == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
            <option value="En progreso" <?= $proyecto->getEstado() == 'En progreso' ? 'selected' : '' ?>>En progreso</option>
            <option value="Completado" <?= $proyecto->getEstado() == 'Completado' ? 'selected' : '' ?>>Completado</option>
        </select>
        <select name="txtIdCli" required>
            <?php foreach($clientes as $cliente): ?>
                <option value="<?= $cliente->getIdcliente() ?>" <?= $proyecto->getIdcliente() == $cliente->getIdcliente() ? 'selected' : '' ?>>
                    <?= $cliente->getNombre() ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Modificar</button>
    </form>
</body>
</html>