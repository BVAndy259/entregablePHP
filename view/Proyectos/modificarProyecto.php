<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proyecto</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Modificar Proyecto</h2>
                
                <?php if($proyecto): ?>
                    <form method="POST" action="indexProyectos.php?action=modificar">
                        <input type="hidden" name="txtId" value="<?php echo $proyecto->getIdproyecto(); ?>">
                        
                        <div>
                            <label for="txtNom">Nombre del Proyecto</label>
                            <input type="text" id="txtNom" name="txtNom" 
                                   value="<?php echo htmlspecialchars($proyecto->getNombre()); ?>" required>
                        </div>
                        
                        <div>
                            <label for="txtDes">Descripción</label>
                            <textarea id="txtDes" name="txtDes" required><?php echo htmlspecialchars($proyecto->getDescripcion()); ?></textarea>
                        </div>
                        
                        <div>
                            <label for="txtEst">Estado</label>
                            <select id="txtEst" name="txtEst" required>
                                <option value="">Seleccione un estado</option>
                                <option value="Pendiente" <?php echo ($proyecto->getEstado() == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                <option value="En progreso" <?php echo ($proyecto->getEstado() == 'En progreso') ? 'selected' : ''; ?>>En progreso</option>
                                <option value="Completado" <?php echo ($proyecto->getEstado() == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="txtIdCli">Cliente</label>
                            <select id="txtIdCli" name="txtIdCli" required>
                                <option value="">Seleccione un cliente</option>
                                <?php if(!empty($clientes)): ?>
                                    <?php foreach($clientes as $cliente): ?>
                                        <option value="<?php echo $cliente->getIdcliente(); ?>" 
                                                <?php echo ($proyecto->getIdcliente() == $cliente->getIdcliente()) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($cliente->getNombre()); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        
                        <div>
                            <button type="submit">Actualizar Proyecto</button>
                            <a href="indexProyectos.php">Cancelar</a>
                        </div>
                    </form>
                <?php else: ?>
                    <div>
                        Proyecto no encontrado.
                        <a href="indexProyectos.php">Volver a la lista</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>