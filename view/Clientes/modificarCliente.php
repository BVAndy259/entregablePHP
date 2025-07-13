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
                        
                        <div>
                            <label for="txtTel">Teléfono</label>
                            <input type="text" id="txtTel" name="txtTel" 
                                   value="<?php echo htmlspecialchars($cliente->getTelefono()); ?>" required>
                        </div>
                        
                        <div>
                            <label for="txtRep">Representante</label>
                            <input type="text" id="txtRep" name="txtRep" 
                                   value="<?php echo htmlspecialchars($cliente->getRepresentante()); ?>" required>
                        </div>
                        
                        <div>
                            <button type="submit">Actualizar Cliente</button>
                            <a href="indexClientes.php">Cancelar</a>
                        </div>
                    </form>
                <?php else: ?>
                    <div>
                        Cliente no encontrado.
                        <a href="indexClientes.php">Volver a la lista</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>