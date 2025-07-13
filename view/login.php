<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - TecnoSoluciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">TecnoSoluciones SAC</h3>
                        <h5 class="text-center text-primary mb-4">Iniciar Sesión</h5>

                        <?php
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }

                            if (isset($_SESSION['error_login'])) {
                                echo "<div class='alert alert-danger text-center'>" . $_SESSION['error_login'] . "</div>";
                                unset($_SESSION['error_login']);
                            }
                        ?>

                        <form method="POST" action="index.php?action=validar">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
