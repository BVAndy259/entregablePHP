<?php
    require_once __DIR__ . '/../model/ClienteModel.php';
    require_once __DIR__ . '/../model/ProyectoModel.php';

    class ReporteController {
        
        public function cargar() {
            $clienteModel = new ClienteModel();
            $proyectoModel = new ProyectoModel();
            $clientes = $clienteModel->cargar();
            $proyectos = $proyectoModel->cargar();
            
            require_once __DIR__ . '/../view/Reportes/reportes.php';
        }
        
        public function reporteCliente() {
            $clienteSeleccionado = null;
            $proyectosDelCliente = [];
            
            if (isset($_GET['idCliente']) && !empty($_GET['idCliente'])) {
                $idCliente = $_GET['idCliente'];
                $clienteModel = new ClienteModel();
                $clienteSeleccionado = $clienteModel->obtenerPorId($idCliente);
                $proyectoModel = new ProyectoModel();
                $proyectosDelCliente = $proyectoModel->obtenerPorCliente($idCliente);
            }

            $clienteModel = new ClienteModel();
            $proyectoModel = new ProyectoModel();
            $clientes = $clienteModel->cargar();
            $proyectos = $proyectoModel->cargar();
            
            require_once __DIR__ . '/../view/Reportes/reportes.php';
        }
        
        public function reporteProyecto() {
            $proyectoSeleccionado = null;
            
            if (isset($_GET['idProyecto']) && !empty($_GET['idProyecto'])) {
                $idProyecto = $_GET['idProyecto'];
                $proyectoModel = new ProyectoModel();
                $proyectoSeleccionado = $proyectoModel->obtenerPorId($idProyecto);
            }

            $clienteModel = new ClienteModel();
            $proyectoModel = new ProyectoModel();
            $clientes = $clienteModel->cargar();
            $proyectos = $proyectoModel->cargar();
            
            require_once __DIR__ . '/../view/Reportes/reportes.php';
        }
    }
?>