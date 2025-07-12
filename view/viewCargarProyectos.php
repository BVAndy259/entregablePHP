<!DOCTYPE html>
<html>
<head>
    <title>Proyectos</title>
</head>
<body>
    <h1>Lista de Proyectos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Cliente ID</th>
        </tr>
        <?php foreach($proyectos as $proyecto): ?>
        <tr>
            <td><?= $proyecto->getIdproyecto() ?></td>
            <td><?= $proyecto->getNombre() ?></td>
            <td><?= $proyecto->getDescripcion() ?></td>
            <td><?= $proyecto->getEstado() ?></td>
            <td><?= $proyecto->getIdcliente() ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>