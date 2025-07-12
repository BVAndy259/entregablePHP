<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Nuevo Cliente</h2>
                <form method="POST" action="indexClientes.php?action=guardar">
                    <div>
                        <label for="txtNom">Nombre del Cliente</label>
                        <input type="text" id="txtNom" name="txtNom" required>
                    </div>
                    
                    <div>
                        <label for="txtRuc">RUC</label>
                        <input type="text" id="txtRuc" name="txtRuc" required>
                    </div>
                    
                    <div>
                        <label for="txtEmail">Email</label>
                        <input type="email" id="txtEmail" name="txtEmail" required>
                    </div>
                    
                    <div>
                        <label for="txtTel">Teléfono</label>
                        <input type="text" id="txtTel" name="txtTel" required>
                    </div>
                    
                    <div>
                        <label for="txtRep">Representante</label>
                        <input type="text" id="txtRep" name="txtRep" required>
                    </div>
                    
                    <div>
                        <button type="submit">Guardar Cliente</button>
                        <a href="indexClientes.php">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>