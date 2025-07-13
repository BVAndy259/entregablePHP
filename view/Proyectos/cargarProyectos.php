<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos - Tecnosoluciones</title>
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
            <h3 class="text-primary">Lista de Proyectos</h3>
            <div>
                <a href="indexProyectos.php?action=guardar" class="btn btn-success me-2">➕ Nuevo Proyecto</a>
                <a href="indexClientes.php" class="btn btn-outline-secondary">👥 Ver Clientes</a>
            </div>
        </div>

        <div class="table-responsive shadow rounded">
            <table class="table table-bordered table-hover align-middle bg-white">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($proyectos)): ?>
                        <?php foreach ($proyectos as $proyecto): ?>
                            <tr>
                                <td><?= $proyecto->getIdproyecto(); ?></td>
                                <td><?= htmlspecialchars($proyecto->getNombre()); ?></td>
                                <td><?= htmlspecialchars($proyecto->getDescripcion()); ?></td>
                                <td>
                                    <?php 
                                        $estado = $proyecto->getEstado();
                                        $badgeClass = match ($estado) {
                                            'Pendiente'   => 'warning',
                                            'En progreso' => 'primary',
                                            'Completado'  => 'success',
                                            default       => 'secondary',
                                        };
                                    ?>
                                    <span class="badge bg-<?= $badgeClass; ?>">
                                        <?= htmlspecialchars($estado); ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($proyecto->getNombreCliente() ?? 'Sin asignar'); ?></td>
                                <td>
                                    <a href="indexProyectos.php?action=modificar&id=<?= $proyecto->getIdproyecto(); ?>" 
                                       class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <a href="indexProyectos.php?action=eliminar&id=<?= $proyecto->getIdproyecto(); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('¿Está seguro de eliminar este proyecto?')">🗑️ Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay proyectos registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
