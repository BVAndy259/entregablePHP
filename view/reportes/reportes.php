<h1>Sistema de Reportes</h1>

<!-- Elección de tipo de reporte -->
<?php if (!isset($_GET['tipo'])): ?>
    <form method="GET" action="indexReportes.php">
        <button type="submit" name="tipo" value="cliente">📄 Reporte por Cliente</button>
        <button type="submit" name="tipo" value="proyecto">📄 Reporte por Proyecto</button>
    </form>
<?php endif; ?>

<!-- Formulario para elegir cliente -->
<?php if ($tipo === 'cliente' && !isset($_GET['cliente_id'])): ?>
    <h2>Seleccione un Cliente</h2>
    <form method="GET" action="indexReportes.php">
        <input type="hidden" name="tipo" value="cliente">
        <select name="cliente_id" required>
            <option value="">-- Seleccionar Cliente --</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente->getIdcliente(); ?>"><?= htmlspecialchars($cliente->getNombre()); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Generar Reporte</button>
    </form>
<?php endif; ?>

<!-- Formulario para elegir proyecto -->
<?php if ($tipo === 'proyecto' && !isset($_GET['proyecto_id'])): ?>
    <h2>Seleccione un Proyecto</h2>
    <form method="GET" action="indexReportes.php">
        <input type="hidden" name="tipo" value="proyecto">
        <select name="proyecto_id" required>
            <option value="">-- Seleccionar Proyecto --</option>
            <?php foreach ($proyectos as $proyecto): ?>
                <option value="<?= $proyecto->getIdproyecto(); ?>"><?= htmlspecialchars($proyecto->getNombre()); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Generar Reporte</button>
    </form>
<?php endif; ?>
