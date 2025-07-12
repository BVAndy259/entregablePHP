<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>RUC</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Representante</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente->getIdcliente() ?></td>
            <td><?= $cliente->getNombre() ?></td>
            <td><?= $cliente->getRuc() ?></td>
            <td><?= $cliente->getEmail() ?></td>
            <td><?= $cliente->getTelefono() ?></td>
            <td><?= $cliente->getRepresentante() ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>