<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proyecto</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Modificar Proyecto</h2>
                
                <?php if($proyecto): ?>
                    <form method="POST" action="indexProyectos.php?action=modificar">
                        <input type="hidden" name="txtId" value="<?php echo $proyecto->getIdproyecto(); ?>">
                        
                        <div class="mb-3">
                            <label for="txtNom" class="form-label">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="txtNom" name="txtNom" 
                                   value="<?php echo htmlspecialchars($proyecto->getNombre()); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txtDes" class="form-label">Descripción</label>
                            <textarea class="form-control" id="txtDes" name="txtDes" rows="4" required><?php echo htmlspecialchars($proyecto->getDescripcion()); ?></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txtEst" class="form-label">Estado</label>
                            <select class="form-select" id="txtEst" name="txtEst" required>
                                <option value="">Seleccione un estado</option>
                                <option value="Pendiente" <?php echo ($proyecto->getEstado() == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                <option value="En progreso" <?php echo ($proyecto->getEstado() == 'En progreso') ? 'selected' : ''; ?>>En progreso</option>
                                <option value="Completado" <?php echo ($proyecto->getEstado() == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txtIdCli" class="form-label">Cliente</label>
                            <select class="form-select" id="txtIdCli" name="txtIdCli" required>
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
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Actualizar Proyecto</button>
                            <a href="indexProyectos.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Proyecto no encontrado.
                        <a href="indexProyectos.php" class="btn btn-primary">Volver a la lista</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>