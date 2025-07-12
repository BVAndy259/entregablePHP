<?php
    require_once __DIR__ . '/../model/ClienteModel.php';

    class ClienteController {
        public function cargar()
        {
            $model = new ClienteModel();
            $clientes = $model->cargar();
            require_once __DIR__ . '/../view/viewCargarClientes.php';
        }

        public function guardar()
        {
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $model = new ClienteModel();
                $cliente = new Cliente();
                $cliente->setNombre($_POST['txtNom']);
                $cliente->setRuc($_POST['txtRuc']);
                $cliente->setEmail($_POST['txtEma']);
                $cliente->setTelefono($_POST['txtTel']);
                $cliente->setRepresentante($_POST['txtRep']);
                $model->guardar($cliente);
                header('Location: index.php');
            } else {
                require_once __DIR__ . '/../view/viewGuardarCliente.php';
            }
        }

        public function modificar() 
        {
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $model = new ClienteModel();
                $cliente = new Cliente();
                $cliente->setNombre($_POST['txtNom']);
                $cliente->setRuc($_POST['txtRuc']);
                $cliente->setEmail($_POST['txtEma']);
                $cliente->setTelefono($_POST['txtTel']);
                $cliente->setRepresentante($_POST['txtRep']);
                $model->modificar($cliente);
                header('Location: index.php');
            } else {
                require_once __DIR__ . '/../view/viewModificarCliente.php';
            }
        }
    }
?>