<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente - TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tecnosoluciones</a>
            <div class="d-flex">
                <a href="dashboard.php" class="btn btn-outline-light btn-sm">Menú Principal</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded-4">
                    <div class="card-body p-5">
                        <h3 class="mb-4 text-center text-primary">Nuevo Cliente</h3>

                        <form method="POST" action="indexClientes.php?action=guardar">
                            <div class="mb-3">
                                <label for="txtNom" class="form-label">Nombre del Cliente</label>
                                <input type="text" class="form-control" id="txtNom" name="txtNom" required>
                            </div>

                            <div class="mb-3">
                                <label for="txtRuc" class="form-label">RUC</label>
                                <input type="text" class="form-control" id="txtRuc" name="txtRuc" required>
                            </div>

                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail" required>
                            </div>

                            <div class="mb-3">
                                <label for="txtTel" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="txtTel" name="txtTel" required>
                            </div>

                            <div class="mb-3">
                                <label for="txtRep" class="form-label">Representante</label>
                                <input type="text" class="form-control" id="txtRep" name="txtRep" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">💾 Guardar Cliente</button>
                                <a href="indexClientes.php" class="btn btn-secondary">↩️ Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
