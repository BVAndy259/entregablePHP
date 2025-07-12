<?php
    require_once __DIR__ . '/../model/ProyectoModel.php';
    require_once __DIR__ . '/../model/ClienteModel.php';

    class ProyectoController {
        public function cargar()
        {
            $model = new ProyectoModel();
            $proyectos = $model->cargar();
            require_once __DIR__ . '/../view/viewCargarProyectos.php';
        }

        public function guardar()
        {
            $model = new ClienteModel();
            $clientes = $model->cargar();
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $model = new ProyectoModel();
                $proyecto = new Proyecto();
                $proyecto->setNombre($_POST['txtNom']);
                $proyecto->setDescripcion($_POST['txtDes']);
                $proyecto->setEstado($_POST['txtEst']);
                $proyecto->setIdcliente($_POST['txtTel']);
                $model->guardar($proyecto);
                header('Location: index.php');
            } else {
                require_once __DIR__ . '/../view/view/viewGuardarProyecto.php';
            }
        }

        public function modificar() 
        {
            $model = new ClienteModel();
            $clientes = $model->cargar();
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $model = new ProyectoModel();
                $proyecto = new Proyecto();
                $proyecto->setNombre($_POST['txtNom']);
                $proyecto->setDescripcion($_POST['txtDes']);
                $proyecto->setEstado($_POST['txtEst']);
                $proyecto->setIdcliente($_POST['txtTel']);
                $model->modificar($proyecto);
                header('Location: index.php');
            } else {
                require_once __DIR__ . '/../view/viewModificarProyecto.php';
            }
        }
    }
?>