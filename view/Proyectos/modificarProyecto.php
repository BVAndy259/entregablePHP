<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proyecto - Tecnosoluciones</title>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded-4">
                    <div class="card-body p-5">
                        <h3 class="text-center text-primary mb-4">Modificar Proyecto</h3>

                        <?php if ($proyecto): ?>
                            <form method="POST" action="indexProyectos.php?action=modificar">
                                <input type="hidden" name="txtId" value="<?= $proyecto->getIdproyecto(); ?>">

                                <div class="mb-3">
                                    <label for="txtNom" class="form-label">Nombre del Proyecto</label>
                                    <input type="text" class="form-control" id="txtNom" name="txtNom" 
                                           value="<?= htmlspecialchars($proyecto->getNombre()); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="txtDes" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="txtDes" name="txtDes" rows="4" required><?= htmlspecialchars($proyecto->getDescripcion()); ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="txtEst" class="form-label">Estado</label>
                                    <select class="form-select" id="txtEst" name="txtEst" required>
                                        <option value="">Seleccione un estado</option>
                                        <option value="Pendiente" <?= ($proyecto->getEstado() == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                        <option value="En progreso" <?= ($proyecto->getEstado() == 'En progreso') ? 'selected' : ''; ?>>En progreso</option>
                                        <option value="Completado" <?= ($proyecto->getEstado() == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="txtIdCli" class="form-label">Cliente</label>
                                    <select class="form-select" id="txtIdCli" name="txtIdCli" required>
                                        <option value="">Seleccione un cliente</option>
                                        <?php if (!empty($clientes)): ?>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <option value="<?= $cliente->getIdcliente(); ?>" 
                                                    <?= ($proyecto->getIdcliente() == $cliente->getIdcliente()) ? 'selected' : ''; ?>>
                                                    <?= htmlspecialchars($cliente->getNombre()); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-warning">🔄 Actualizar Proyecto</button>
                                    <a href="indexProyectos.php" class="btn btn-secondary">↩️ Cancelar</a>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-danger text-center">
                                Proyecto no encontrado.
                            </div>
                            <div class="text-center mt-3">
                                <a href="indexProyectos.php" class="btn btn-outline-primary">Volver a la Lista</a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
