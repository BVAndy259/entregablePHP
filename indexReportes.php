<?php
    require_once __DIR__ . '/model/ClienteModel.php';
    require_once __DIR__ . '/model/ProyectoModel.php';

    $clienteModel = new ClienteModel();
    $proyectoModel = new ProyectoModel();
    $clientes = $clienteModel->cargar();
    $proyectos = $proyectoModel->cargar();
    $clienteSeleccionado = null;
    $proyectosCliente = [];
    $proyectoSeleccionado = null;
    $clienteDelProyecto = null;
    $tipo = $_GET['tipo'] ?? null;
    $clienteId = $_GET['cliente_id'] ?? null;
    $proyectoId = $_GET['proyecto_id'] ?? null;

    if ($tipo === 'cliente' && $clienteId) {
        $clienteSeleccionado = $clienteModel->obtenerPorId($clienteId);
        $proyectosCliente = $proyectoModel->obtenerPorCliente($clienteId);
    }

    if ($tipo === 'proyecto' && $proyectoId) {
        $proyectoSeleccionado = $proyectoModel->obtenerPorId($proyectoId);
        if ($proyectoSeleccionado && $proyectoSeleccionado->getIdcliente()) {
            $clienteDelProyecto = $clienteModel->obtenerPorId($proyectoSeleccionado->getIdcliente());
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes - Tecnosoluciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tecnosoluciones</a>
        <div class="d-flex">
            <a href="dashboard.php" class="btn btn-outline-light btn-sm no-print">Menú Principal</a>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <h2 class="text-center text-primary mb-4">Sistema de Reportes</h2>

            <?php if (!$tipo): ?>
                <div class="text-center mb-4 no-print">
                    <a href="indexReportes.php?tipo=cliente" class="btn btn-primary me-3">Ver Reporte por Cliente</a>
                    <a href="indexReportes.php?tipo=proyecto" class="btn btn-secondary">Ver Reporte por Proyecto</a>
                </div>
            <?php endif; ?>

            <?php if ($tipo === 'cliente' && !$clienteId): ?>
                <form method="GET" action="indexReportes.php" class="card p-4 shadow-sm no-print">
                    <input type="hidden" name="tipo" value="cliente">
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Seleccione un Cliente:</label>
                        <select name="cliente_id" id="cliente_id" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= $cliente->getIdcliente(); ?>"><?= htmlspecialchars($cliente->getNombre()); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="indexReportes.php" class="btn btn-outline-secondary">← Atrás</a>
                        <button type="submit" class="btn btn-success">Ver Reporte</button>
                    </div>
                </form>
            <?php endif; ?>

            <?php if ($tipo === 'proyecto' && !$proyectoId): ?>
                <form method="GET" action="indexReportes.php" class="card p-4 shadow-sm no-print">
                    <input type="hidden" name="tipo" value="proyecto">
                    <div class="mb-3">
                        <label for="proyecto_id" class="form-label">Seleccione un Proyecto:</label>
                        <select name="proyecto_id" id="proyecto_id" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            <?php foreach ($proyectos as $proyecto): ?>
                                <option value="<?= $proyecto->getIdproyecto(); ?>"><?= htmlspecialchars($proyecto->getNombre()); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="indexReportes.php" class="btn btn-outline-secondary">← Atrás</a>
                        <button type="submit" class="btn btn-success">Ver Reporte</button>
                    </div>
                </form>
            <?php endif; ?>

            <?php if ($clienteSeleccionado): ?>
                <div class="card p-4 shadow-sm mt-4">
                    <h3 class="mb-3 text-primary">Reporte de Cliente</h3>
                    <p><strong>ID:</strong> <?= $clienteSeleccionado->getIdcliente(); ?></p>
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($clienteSeleccionado->getNombre()); ?></p>
                    <p><strong>RUC:</strong> <?= htmlspecialchars($clienteSeleccionado->getRuc()); ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($clienteSeleccionado->getEmail()); ?></p>
                    <p><strong>Teléfono:</strong> <?= htmlspecialchars($clienteSeleccionado->getTelefono()); ?></p>
                    <p><strong>Representante:</strong> <?= htmlspecialchars($clienteSeleccionado->getRepresentante()); ?></p>

                    <h5 class="mt-4">Proyectos asignados:</h5>
                    <?php if (!empty($proyectosCliente)): ?>
                        <ul>
                            <?php foreach ($proyectosCliente as $proy): ?>
                                <li><?= htmlspecialchars($proy->getNombre()); ?> - <?= htmlspecialchars($proy->getEstado()); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">Este cliente no tiene proyectos.</p>
                    <?php endif; ?>

                    <div class="mt-3 no-print d-flex justify-content-between">
                        <a href="indexReportes.php" class="btn btn-outline-secondary">← Atrás</a>
                        <button onclick="window.print();" class="btn btn-dark">🖨️ Imprimir o Guardar como PDF</button>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($proyectoSeleccionado): ?>
                <div class="card p-4 shadow-sm mt-4">
                    <h3 class="mb-3 text-primary">Reporte de Proyecto</h3>
                    <p><strong>ID:</strong> <?= $proyectoSeleccionado->getIdproyecto(); ?></p>
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($proyectoSeleccionado->getNombre()); ?></p>
                    <p><strong>Descripción:</strong> <?= htmlspecialchars($proyectoSeleccionado->getDescripcion()); ?></p>
                    <p><strong>Estado:</strong> <?= htmlspecialchars($proyectoSeleccionado->getEstado()); ?></p>

                    <?php if ($clienteDelProyecto): ?>
                        <h5 class="mt-4">Cliente asignado:</h5>
                        <p><strong>Nombre:</strong> <?= htmlspecialchars($clienteDelProyecto->getNombre()); ?></p>
                        <p><strong>RUC:</strong> <?= htmlspecialchars($clienteDelProyecto->getRuc()); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($clienteDelProyecto->getEmail()); ?></p>
                        <p><strong>Teléfono:</strong> <?= htmlspecialchars($clienteDelProyecto->getTelefono()); ?></p>
                        <p><strong>Representante:</strong> <?= htmlspecialchars($clienteDelProyecto->getRepresentante()); ?></p>
                    <?php else: ?>
                        <p class="text-muted">Este proyecto no tiene cliente asignado.</p>
                    <?php endif; ?>

                    <div class="mt-3 no-print d-flex justify-content-between">
                        <a href="indexReportes.php" class="btn btn-outline-secondary">← Atrás</a>
                        <button onclick="window.print();" class="btn btn-dark">🖨️ Imprimir o Guardar como PDF</button>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
