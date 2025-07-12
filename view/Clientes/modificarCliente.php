<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Modificar Cliente</h2>
                
                <?php if($cliente): ?>
                    <form method="POST" action="indexClientes.php?action=modificar">
                        <input type="hidden" name="txtId" value="<?php echo $cliente->getIdcliente(); ?>">
                        
                        <div>
                            <label for="txtNom">Nombre del Cliente</label>
                            <input type="text" id="txtNom" name="txtNom" value="<?php echo htmlspecialchars($cliente->getNombre()); ?>" required>
                        </div>
                        
                        <div>
                            <label for="txtRuc">RUC</label>
                            <input type="text" id="txtRuc" name="txtRuc" value="<?php echo htmlspecialchars($cliente->getRuc()); ?>" required>
                        </div>
                        
                        <div>
                            <label for="txtEmail">Email</label>
                            <input type="email" id="txtEmail" name="txtEmail" value="<?php echo htmlspecialchars($cliente->getEmail()); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txtTel" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="txtTel" name="txtTel" 
                                   value="<?php echo htmlspecialchars($cliente->getTelefono()); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="txtRep" class="form-label">Representante</label>
                            <input type="text" class="form-control" id="txtRep" name="txtRep" 
                                   value="<?php echo htmlspecialchars($cliente->getRepresentante()); ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Actualizar Cliente</button>
                            <a href="indexClientes.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Cliente no encontrado.
                        <a href="indexClientes.php" class="btn btn-primary">Volver a la lista</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>