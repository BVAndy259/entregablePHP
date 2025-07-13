<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .form-section { margin: 20px 0; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .report-section { margin: 20px 0; padding: 20px; border: 1px solid #007bff; border-radius: 5px; background-color: #f8f9fa; }
        select, button { padding: 8px 12px; margin: 5px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        table th, table td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        table th { background-color: #007bff; color: white; }
        .btn { padding: 10px 20px; margin: 10px 5px; text-decoration: none; border-radius: 3px; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .nav-links { margin: 30px 0; }
        .nav-links a { margin-right: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Reportes</h1>
        
        <!-- Reporte de Clientes -->
        <div class="form-section">
            <h2>Reporte de Clientes</h2>
            <form method="GET" action="indexReportes.php">
                <input type="hidden" name="tipo" value="cliente">
                <label for="cliente_id">Seleccione un Cliente:</label>
                <select name="cliente_id" id="cliente_id" required>
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
                <button type="submit" class="btn btn-primary">Generar Reporte</button>
            </form>
            
            <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'cliente' && !empty($clienteSeleccionado)): ?>
                <div class="report-section">
                    <h3>📊 Información del Cliente</h3>
                    <table>
                        <tr><th>Campo</th><th>Valor</th></tr>
                        <tr><td><strong>ID:</strong></td><td><?php echo $clienteSeleccionado->getIdcliente(); ?></td></tr>
                        <tr><td><strong>Nombre:</strong></td><td><?php echo htmlspecialchars($clienteSeleccionado->getNombre()); ?></td></tr>
                        <tr><td><strong>RUC:</strong></td><td><?php echo htmlspecialchars($clienteSeleccionado->getRuc()); ?></td></tr>
                        <tr><td><strong>Email:</strong></td><td><?php echo htmlspecialchars($clienteSeleccionado->getEmail()); ?></td></tr>
                        <tr><td><strong>Teléfono:</strong></td><td><?php echo htmlspecialchars($clienteSeleccionado->getTelefono()); ?></td></tr>
                        <tr><td><strong>Representante:</strong></td><td><?php echo htmlspecialchars($clienteSeleccionado->getRepresentante()); ?></td></tr>
                    </table>
                    
                    <h4>🚀 Proyectos del Cliente</h4>
                    <?php if (!empty($proyectosCliente)): ?>
                        <p><strong>Total de proyectos:</strong> <?php echo count($proyectosCliente); ?></p>
                        <table>
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
                                        <td>
                                            <span style="
                                                padding: 3px 8px; 
                                                border-radius: 3px; 
                                                color: white; 
                                                background-color: <?php 
                                                    echo match($proyecto->getEstado()) {
                                                        'Pendiente' => '#ffc107',
                                                        'En progreso' => '#007bff',
                                                        'Completado' => '#28a745',
                                                        default => '#6c757d'
                                                    };
                                                ?>
                                            ">
                                                <?php echo htmlspecialchars($proyecto->getEstado()); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p style="color: #dc3545;">⚠️ Este cliente no tiene proyectos asignados.</p>
                    <?php endif; ?>
                    
                    <button onclick="window.print();" class="btn btn-success">🖨️ Imprimir Reporte</button>
                </div>
            <?php endif; ?>
        </div>
        
        <hr style="margin: 30px 0;">
        
        <!-- Reporte de Proyectos -->
        <div class="form-section">
            <h2>Reporte de Proyectos</h2>
            <form method="GET" action="indexReportes.php">
                <input type="hidden" name="tipo" value="proyecto">
                <label for="proyecto_id">Seleccione un Proyecto:</label>
                <select name="proyecto_id" id="proyecto_id" required>
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
                <button type="submit" class="btn btn-primary">Generar Reporte</button>
            </form>
            
            <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'proyecto' && !empty($proyectoSeleccionado)): ?>
                <div class="report-section">
                    <h3>📋 Información del Proyecto</h3>
                    <table>
                        <tr><th>Campo</th><th>Valor</th></tr>
                        <tr><td><strong>ID:</strong></td><td><?php echo $proyectoSeleccionado->getIdproyecto(); ?></td></tr>
                        <tr><td><strong>Nombre:</strong></td><td><?php echo htmlspecialchars($proyectoSeleccionado->getNombre()); ?></td></tr>
                        <tr><td><strong>Descripción:</strong></td><td><?php echo htmlspecialchars($proyectoSeleccionado->getDescripcion()); ?></td></tr>
                        <tr><td><strong>Estado:</strong></td><td>
                            <span style="
                                padding: 3px 8px; 
                                border-radius: 3px; 
                                color: white; 
                                background-color: <?php 
                                    echo match($proyectoSeleccionado->getEstado()) {
                                        'Pendiente' => '#ffc107',
                                        'En progreso' => '#007bff',
                                        'Completado' => '#28a745',
                                        default => '#6c757d'
                                    };
                                ?>
                            ">
                                <?php echo htmlspecialchars($proyectoSeleccionado->getEstado()); ?>
                            </span>
                        </td></tr>
                    </table>
                    
                    <h4>👤 Cliente Asignado</h4>
                    <?php if (!empty($clienteDelProyecto)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Cliente</th>
                                    <th>RUC</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Representante</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $clienteDelProyecto->getIdcliente(); ?></td>
                                    <td><?php echo htmlspecialchars($clienteDelProyecto->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($clienteDelProyecto->getRuc()); ?></td>
                                    <td><?php echo htmlspecialchars($clienteDelProyecto->getEmail()); ?></td>
                                    <td><?php echo htmlspecialchars($clienteDelProyecto->getTelefono()); ?></td>
                                    <td><?php echo htmlspecialchars($clienteDelProyecto->getRepresentante()); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p style="color: #dc3545;">⚠️ Este proyecto no tiene cliente asignado.</p>
                    <?php endif; ?>
                    
                    <button onclick="window.print();" class="btn btn-success">🖨️ Imprimir Reporte</button>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Enlaces de navegación -->
        <div class="nav-links">
            <h3>Navegación</h3>
            <a href="indexClientes.php" class="btn btn-secondary">👥 Gestión de Clientes</a>
            <a href="indexProyectos.php" class="btn btn-secondary">📁 Gestión de Proyectos</a>
            <a href="dashboard.php" class="btn btn-secondary">🏠 Dashboard</a>
        </div>
    </div>
</body>
</html>