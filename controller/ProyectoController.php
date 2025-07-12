<?php
    require_once __DIR__ . '/../model/ProyectoModel.php';
    class FamiliaController{
        public function cargar(){
            $model = new ProyectoModel();
            $proyectos = $model->cargar();
            require_once './view/viewCargarProyectos.php';
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
                header('Location: index.php');
            }
            else{
                require_once './view/viewGuardarProyecto.php';
            }
        }

        public function modificar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model = new ProyectoModel();
                $proyecto = new Proyecto();
                $proyecto->setNombre($_POST['txtNom']);
                $proyecto->setDescripcion($_POST['txtDes']);
                $proyecto->setEstado($_POST['txtEst']);
                $proyecto->setIdcliente($_POST['txtIdCli']);
                $model->modificar($proyecto);
                header('Location: index.php');
            }
            else{
                require_once './view/viewModificarProyecto.php';
            }
        }
    }
?>