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
<html>
<head>
    <title>Reportes</title>
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <h1>Sistema de Reportes</h1>

    <?php if (!$tipo): ?>
        <form method="GET" action="indexReportes.php" class="no-print">
            <button type="submit" name="tipo" value="cliente">Ver reporte por Cliente</button>
            <button type="submit" name="tipo" value="proyecto">Ver reporte por Proyecto</button>
        </form>
    <?php endif; ?>

    <?php if ($tipo === 'cliente' && !$clienteId): ?>
        <form method="GET" action="indexReportes.php" class="no-print">
            <input type="hidden" name="tipo" value="cliente">
            <label>Seleccione un Cliente:</label>
            <select name="cliente_id" required>
                <option value="">-- Seleccionar --</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente->getIdcliente(); ?>">
                        <?= htmlspecialchars($cliente->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ver Reporte</button>
        </form>
    <?php endif; ?>

    <?php if ($tipo === 'proyecto' && !$proyectoId): ?>
        <form method="GET" action="indexReportes.php" class="no-print">
            <input type="hidden" name="tipo" value="proyecto">
            <label>Seleccione un Proyecto:</label>
            <select name="proyecto_id" required>
                <option value="">Seleccionar</option>
                <?php foreach ($proyectos as $proyecto): ?>
                    <option value="<?= $proyecto->getIdproyecto(); ?>">
                        <?= htmlspecialchars($proyecto->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ver Reporte</button>
        </form>
    <?php endif; ?>

    <!-- Paso 3: Mostrar reporte de cliente -->
    <?php if ($clienteSeleccionado): ?>
        <h2>Reporte de Cliente</h2>
        <p><strong>ID:</strong> <?= $clienteSeleccionado->getIdcliente(); ?></p>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($clienteSeleccionado->getNombre()); ?></p>
        <p><strong>RUC:</strong> <?= htmlspecialchars($clienteSeleccionado->getRuc()); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($clienteSeleccionado->getEmail()); ?></p>
        <p><strong>Teléfono:</strong> <?= htmlspecialchars($clienteSeleccionado->getTelefono()); ?></p>
        <p><strong>Representante:</strong> <?= htmlspecialchars($clienteSeleccionado->getRepresentante()); ?></p>

        <h3>Proyectos asignados:</h3>
        <?php if (!empty($proyectosCliente)): ?>
            <ul>
                <?php foreach ($proyectosCliente as $proy): ?>
                    <li><?= htmlspecialchars($proy->getNombre()); ?> - <?= htmlspecialchars($proy->getEstado()); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Este cliente no tiene proyectos.</p>
        <?php endif; ?>

        <button onclick="window.print();" class="no-print">Imprimir o Guardar como PDF</button>
    <?php endif; ?>

    <?php if ($proyectoSeleccionado): ?>
        <h2>Reporte de Proyecto</h2>
        <p><strong>ID:</strong> <?= $proyectoSeleccionado->getIdproyecto(); ?></p>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($proyectoSeleccionado->getNombre()); ?></p>
        <p><strong>Descripción:</strong> <?= htmlspecialchars($proyectoSeleccionado->getDescripcion()); ?></p>
        <p><strong>Estado:</strong> <?= htmlspecialchars($proyectoSeleccionado->getEstado()); ?></p>

        <?php if ($clienteDelProyecto): ?>
            <h3>Cliente asignado</h3>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($clienteDelProyecto->getNombre()); ?></p>
            <p><strong>RUC:</strong> <?= htmlspecialchars($clienteDelProyecto->getRuc()); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($clienteDelProyecto->getEmail()); ?></p>
            <p><strong>Teléfono:</strong> <?= htmlspecialchars($clienteDelProyecto->getTelefono()); ?></p>
            <p><strong>Representante:</strong> <?= htmlspecialchars($clienteDelProyecto->getRepresentante()); ?></p>
        <?php else: ?>
            <p>Este proyecto no tiene cliente asignado.</p>
        <?php endif; ?>

        <button onclick="window.print();" class="no-print">Imprimir o Guardar como PDF</button>
    <?php endif; ?>
</body>
</html>
