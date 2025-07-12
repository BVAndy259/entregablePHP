<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Nuevo Proyecto</h2>
                <form method="POST" action="indexProyectos.php?action=guardar">
                    <div class="mb-3">
                        <label for="txtNom" class="form-label">Nombre del Proyecto</label>
                        <input type="text" class="form-control" id="txtNom" name="txtNom" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="txtDes" class="form-label">Descripción</label>
                        <textarea class="form-control" id="txtDes" name="txtDes" rows="4" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="txtEst" class="form-label">Estado</label>
                        <select class="form-select" id="txtEst" name="txtEst" required>
                            <option value="">Seleccione un estado</option>
                            <option value="En Proceso">Pendiente</option>
                            <option value="Activo">En progreso</option>
                            <option value="Pausado">Completado</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="txtIdCli" class="form-label">Cliente</label>
                        <select class="form-select" id="txtIdCli" name="txtIdCli" required>
                            <option value="">Seleccione un cliente</option>
                            <?php if(!empty($clientes)): ?>
                                <?php foreach($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente->getIdcliente(); ?>">
                                        <?php echo htmlspecialchars($cliente->getNombre()); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Guardar Proyecto</button>
                        <a href="indexProyectos.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>