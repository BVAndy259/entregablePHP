<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Nuevo Proyecto</h2>
                <form method="POST" action="indexProyectos.php?action=guardar">
                    <div>
                        <label for="txtNom">Nombre del Proyecto</label>
                        <input type="text" id="txtNom" name="txtNom" required>
                    </div>
                    
                    <div>
                        <label for="txtDes">Descripción</label>
                        <textarea id="txtDes" name="txtDes" required></textarea>
                    </div>
                    
                    <div>
                        <label for="txtEst">Estado</label>
                        <select id="txtEst" name="txtEst" required>
                            <option value="">Seleccione un estado</option>
                            <option value="En Proceso">Pendiente</option>
                            <option value="Activo">En progreso</option>
                            <option value="Pausado">Completado</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="txtIdCli">Cliente</label>
                        <select id="txtIdCli" name="txtIdCli" required>
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
                    
                    <div>
                        <button type="submit">Guardar Proyecto</button>
                        <a href="indexProyectos.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>