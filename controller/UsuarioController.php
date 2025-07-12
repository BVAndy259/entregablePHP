<?php
    require_once __DIR__ . '/../model/UsuarioModel.php';
    require_once __DIR__ . '/../model/Usuario.php'; 

    class UsuarioController {
        public function validar() 
        {
            session_start();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                $usuario = new Usuario(null, null, $email, $password, null);

                $model = new UsuarioModel();
                $datos = $model->validar($usuario);

                if ($datos) {
                    $_SESSION['idUsuario'] = $datos['idUsuario'];
                    $_SESSION['nombre'] = $datos['nomUsuario'];
                    $_SESSION['rol'] = $datos['rol'];

                    header("Location: dashboard.php");
                    exit();
                } else {
                    $_SESSION['error_login'] = "Correo o contraseña incorrectos.";
                    header("Location: index.php");
                    exit();
                }
            } else {
                header("Location: index.php");
                exit();
            }
        }

        public function guardar() 
        {
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $model = new UsuarioModel();
                $usuario = new Usuario();
                $usuario->setNomUsuario($_POST['txtNom']);
                $usuario->setEmail($_POST['txtEma']);
                $usuario->setPassword($_POST['txtPass']);
                $usuario->setRol($_POST['txtRol']);
                $model->guardar($usuario);
                header('Location: index.php');
            } else {
                require_once __DIR__ . '/../view/viewGuardarFamilia.php';
            }
        }
    }
?>