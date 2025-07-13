<?php
    require_once __DIR__ . '/../model/ClienteModel.php';

    class ClienteController {
        public function cargar(){
            $model = new ClienteModel();
            $clientes = $model->cargar();
            require_once __DIR__ . '/../view/Clientes/cargarClientes.php';
        }

        public function guardar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model = new ClienteModel();
                $cliente = new Cliente();
                $cliente->setNombre($_POST['txtNom']);
                $cliente->setRuc($_POST['txtRuc']);
                $cliente->setEmail($_POST['txtEmail']);
                $cliente->setTelefono($_POST['txtTel']);
                $cliente->setRepresentante($_POST['txtRep']);
                $model->guardar($cliente);
                header('Location: indexClientes.php');
                exit();
            } else {
                require_once __DIR__ . '/../view/Clientes/guardarCliente.php';
            }
        }

        public function modificar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model = new ClienteModel();
                $cliente = new Cliente();
                $cliente->setIdcliente($_POST['txtId']);
                $cliente->setNombre($_POST['txtNom']);
                $cliente->setRuc($_POST['txtRuc']);
                $cliente->setEmail($_POST['txtEmail']);
                $cliente->setTelefono($_POST['txtTel']);
                $cliente->setRepresentante($_POST['txtRep']);
                $model->modificar($cliente);
                header('Location: indexClientes.php');
                exit();
            } else {
                $model = new ClienteModel();
                $cliente = null;
                if(isset($_GET['id'])){
                    $cliente = $model->obtenerPorId($_GET['id']);
                }
                require_once __DIR__ . '/../view/Clientes/modificarCliente.php';
            }
        }

        public function eliminar(){
            if(isset($_GET['id'])){
                $model = new ClienteModel();
                $model->eliminar($_GET['id']);
                header('Location: indexClientes.php');
                exit();
            }
        }
    }
?>