<?php
    require_once __DIR__ . '/../model/ProyectoModel.php';
    require_once __DIR__ . '/../model/ClienteModel.php';
    
    class ProyectoController {
        public function cargar(){
            $model = new ProyectoModel();
            $proyectos = $model->cargar();
            require_once __DIR__ . '/../view/Proyectos/cargarProyectos.php';
        }

        public function guardar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model = new ProyectoModel();
                $proyecto = new Proyecto();
                $proyecto->setNombre($_POST['txtNom']);
                $proyecto->setDescripcion($_POST['txtDes']);
                $proyecto->setEstado($_POST['txtEst']);
                $proyecto->setIdcliente($_POST['txtIdCli']);
                $model->guardar($proyecto);
                header('Location: indexProyectos.php');
                exit();
            } else {
                $clienteModel = new ClienteModel();
                $clientes = $clienteModel->cargar();
                require_once __DIR__ . '/../view/Proyectos/guardarProyecto.php';
            }
        }

        public function modificar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model = new ProyectoModel();
                $proyecto = new Proyecto();
                $proyecto->setIdproyecto($_POST['txtId']);
                $proyecto->setNombre($_POST['txtNom']);
                $proyecto->setDescripcion($_POST['txtDes']);
                $proyecto->setEstado($_POST['txtEst']);
                $proyecto->setIdcliente($_POST['txtIdCli']);
                $model->modificar($proyecto);
                header('Location: indexProyectos.php');
                exit();
            } else {
                $model = new ProyectoModel();
                $proyecto = null;
                $clientes = [];
                if(isset($_GET['id'])){
                    $proyecto = $model->obtenerPorId($_GET['id']);
                    $clienteModel = new ClienteModel();
                    $clientes = $clienteModel->cargar();
                }
                require_once __DIR__ . '/../view/Proyectos/modificarProyecto.php';
            }
        }

        public function eliminar(){
            if(isset($_GET['id'])){
                $model = new ProyectoModel();
                $model->eliminar($_GET['id']);
                header('Location: indexProyectos.php');
                exit();
            }
        }
    }
?>