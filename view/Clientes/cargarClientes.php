<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Lista de Clientes</h2>
                <a href="indexClientes.php?action=guardar">Nuevo Cliente</a>
                
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>RUC</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Representante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($clientes)): ?>
                            <?php foreach($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo $cliente->getIdcliente(); ?></td>
                                    <td><?php echo htmlspecialchars($cliente->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($cliente->getRuc()); ?></td>
                                    <td><?php echo htmlspecialchars($cliente->getEmail()); ?></td>
                                    <td><?php echo htmlspecialchars($cliente->getTelefono()); ?></td>
                                    <td><?php echo htmlspecialchars($cliente->getRepresentante()); ?></td>
                                    <td>
                                        <a href="indexClientes.php?action=modificar&id=<?php echo $cliente->getIdcliente(); ?>">Editar</a>
                                        <a href="indexClientes.php?action=eliminar&id=<?php echo $cliente->getIdcliente(); ?>" 
                                            onclick="return confirm('¿Está seguro de eliminar este cliente?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td>No hay clientes registrados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>