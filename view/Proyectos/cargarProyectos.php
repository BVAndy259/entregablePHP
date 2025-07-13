<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Lista de Proyectos</h2>
                <div class="mb-3">
                    <a href="indexProyectos.php?action=guardar">Nuevo Proyecto</a>
                    <a href="indexClientes.php">Ver Clientes</a>
                </div>
                
                <table border="1">
                    <thead>
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
                        <?php if(!empty($proyectos)): ?>
                            <?php foreach($proyectos as $proyecto): ?>
                                <tr>
                                    <td><?php echo $proyecto->getIdproyecto(); ?></td>
                                    <td><?php echo htmlspecialchars($proyecto->getNombre()); ?></td>
                                    <td><?php echo htmlspecialchars($proyecto->getDescripcion()); ?></td>
                                    <td>
                                        <?php 
                                        $estado = $proyecto->getEstado();
                                        $badgeClass = '';
                                        switch($estado) {
                                            case 'Pendiente':
                                                $badgeClass = 'bg-warning';
                                                break;
                                            case 'En progreso':
                                                $badgeClass = 'bg-primary';
                                                break;
                                            case 'Completado':
                                                $badgeClass = 'bg-success';
                                                break;
                                            default:
                                                $badgeClass = 'bg-secondary';
                                                break;
                                        }
                                        ?>
                                        <span <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($estado); ?></span>
                                    </td>
                                    <td><?php echo htmlspecialchars($proyecto->getNombreCliente() ?? 'Sin asignar'); ?></td>
                                    <td>
                                        <a href="indexProyectos.php?action=modificar&id=<?php echo $proyecto->getIdproyecto(); ?>" 
                                           class="btn btn-warning btn-sm">Editar</a>
                                        <a href="indexProyectos.php?action=eliminar&id=<?php echo $proyecto->getIdproyecto(); ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('¿Está seguro de eliminar este proyecto?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td>No hay proyectos registrados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>