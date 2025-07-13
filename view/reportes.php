<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>
<body>
    <h1>Sistema de Reportes</h1>
    
    <div>
        <h2>Reporte de Clientes</h2>
        <form method="GET" action="reportes.php">
            <input type="hidden" name="tipo" value="cliente">
            <label for="cliente_id">Seleccione un Cliente:</label>
            <select name="cliente_id" id="cliente_id">
                <option value="">-- Seleccionar Cliente --</option>
                <?php
                if (!empty($clientes)) {
                    foreach ($clientes as $cliente) {
                        $selected = (isset($_GET['cliente_id']) && $_GET['cliente_id'] == $cliente->getIdcliente()) ? 'selected' : '';
                        echo "<option value='" . $cliente->getIdcliente() . "' $selected>" . htmlspecialchars($cliente->getNombre()) . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit">Generar Reporte</button>
        </form>
        
        <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'cliente' && !empty($clienteSeleccionado)): ?>
            <div style="margin-top: 20px; border: 1px solid #ccc; padding: 15px;">
                <h3>Información del Cliente</h3>
                <p><strong>ID:</strong> <?php echo $clienteSeleccionado->getIdcliente(); ?></p>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($clienteSeleccionado->getNombre()); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($clienteSeleccionado->getEmail()); ?></p>
                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($clienteSeleccionado->getTelefono()); ?></p>
                
                <h4>Proyectos del Cliente</h4>
                <?php if (!empty($proyectosCliente)): ?>
                    <table border="1" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Proyecto</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proyectosCliente as $proyecto): ?>
                                <tr>
                                    <td><?php echo $proyecto->getIdproyecto(); ?></td>
                                    <td><?php echo htmlspecialchars($proyecto->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($proyecto->getDescripcion()); ?></td>
                                    <td><?php echo htmlspecialchars($proyecto->getEstado()); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Este cliente no tiene proyectos asignados.</p>
                <?php endif; ?>
                
                <button onclick="window.print();" style="margin-top: 15px; padding: 10px 20px;">Imprimir Reporte</button>
            </div>
        <?php endif; ?>
    </div>
    
    <hr style="margin: 30px 0;">
    
    <div>
        <h2>Reporte de Proyectos</h2>
        <form method="GET" action="reportes.php">
            <input type="hidden" name="tipo" value="proyecto">
            <label for="proyecto_id">Seleccione un Proyecto:</label>
            <select name="proyecto_id" id="proyecto_id">
                <option value="">-- Seleccionar Proyecto --</option>
                <?php
                if (!empty($proyectos)) {
                    foreach ($proyectos as $proyecto) {
                        $selected = (isset($_GET['proyecto_id']) && $_GET['proyecto_id'] == $proyecto->getIdproyecto()) ? 'selected' : '';
                        echo "<option value='" . $proyecto->getIdproyecto() . "' $selected>" . htmlspecialchars($proyecto->getNombre()) . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit">Generar Reporte</button>
        </form>
        
        <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'proyecto' && !empty($proyectoSeleccionado)): ?>
            <div style="margin-top: 20px; border: 1px solid #ccc; padding: 15px;">
                <h3>Información del Proyecto</h3>
                <p><strong>ID:</strong> <?php echo $proyectoSeleccionado->getIdproyecto(); ?></p>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($proyectoSeleccionado->getNombre()); ?></p>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($proyectoSeleccionado->getDescripcion()); ?></p>
                <p><strong>Estado:</strong> <?php echo htmlspecialchars($proyectoSeleccionado->getEstado()); ?></p>
                
                <h4>Cliente Asignado</h4>
                <?php if (!empty($clienteDelProyecto)): ?>
                    <table border="1" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Cliente</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $clienteDelProyecto->getIdcliente(); ?></td>
                                <td><?php echo htmlspecialchars($clienteDelProyecto->getNombre()); ?></td>
                                <td><?php echo htmlspecialchars($clienteDelProyecto->getEmail()); ?></td>
                                <td><?php echo htmlspecialchars($clienteDelProyecto->getTelefono()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Este proyecto no tiene cliente asignado.</p>
                <?php endif; ?>
                
                <button onclick="window.print();" style="margin-top: 15px; padding: 10px 20px;">Imprimir Reporte</button>
            </div>
        <?php endif; ?>
    </div>
    
    <div style="margin-top: 30px;">
        <a href="index.php">Volver a Clientes</a> | 
        <a href="indexProyectos.php">Volver a Proyectos</a>
    </div>
</body>
</html>