<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes - TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tecnosoluciones</a>
            <div class="d-flex">
                <a href="dashboard.php" class="btn btn-outline-light btn-sm">Menú Principal</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary">Lista de Clientes</h3>
            <a href="indexClientes.php?action=guardar" class="btn btn-success">
                ➕ Nuevo Cliente
            </a>
        </div>

        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-hover align-middle bg-white">
                <thead class="table-primary">
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
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente->getIdcliente(); ?></td>
                                <td><?= htmlspecialchars($cliente->getNombre()); ?></td>
                                <td><?= htmlspecialchars($cliente->getRuc()); ?></td>
                                <td><?= htmlspecialchars($cliente->getEmail()); ?></td>
                                <td><?= htmlspecialchars($cliente->getTelefono()); ?></td>
                                <td><?= htmlspecialchars($cliente->getRepresentante()); ?></td>
                                <td>
                                    <a href="indexClientes.php?action=modificar&id=<?= $cliente->getIdcliente(); ?>" class="btn btn-sm btn-warning">
                                        ✏️ Editar
                                    </a>
                                    <a href="indexClientes.php?action=eliminar&id=<?= $cliente->getIdcliente(); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                                       🗑️ Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay clientes registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
