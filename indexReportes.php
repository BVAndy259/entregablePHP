<?php
require_once __DIR__ . '/model/ClienteModel.php';
require_once __DIR__ . '/model/ProyectoModel.php';

// Inicializar modelos
$clienteModel = new ClienteModel();
$proyectoModel = new ProyectoModel();

// Cargar todos los clientes y proyectos para los combos
$clientes = $clienteModel->cargar();
$proyectos = $proyectoModel->cargar();

// Variables para almacenar los datos seleccionados
$clienteSeleccionado = null;
$proyectosCliente = [];
$proyectoSeleccionado = null;
$clienteDelProyecto = null;

// Procesar reporte de cliente
if (isset($_GET['tipo']) && $_GET['tipo'] == 'cliente' && !empty($_GET['cliente_id'])) {
    $clienteId = $_GET['cliente_id'];
    
    // Obtener cliente seleccionado
    $clienteSeleccionado = $clienteModel->obtenerPorId($clienteId);
    
    // Obtener proyectos del cliente
    $proyectosCliente = $proyectoModel->obtenerPorCliente($clienteId);
}

// Procesar reporte de proyecto
if (isset($_GET['tipo']) && $_GET['tipo'] == 'proyecto' && !empty($_GET['proyecto_id'])) {
    $proyectoId = $_GET['proyecto_id'];
    
    // Obtener proyecto seleccionado
    $proyectoSeleccionado = $proyectoModel->obtenerPorId($proyectoId);
    
    // Obtener cliente del proyecto
    if ($proyectoSeleccionado && $proyectoSeleccionado->getIdcliente()) {
        $clienteDelProyecto = $clienteModel->obtenerPorId($proyectoSeleccionado->getIdcliente());
    }
}

// ✅ CORREGIDO: Ruta correcta del archivo
include __DIR__ . '/view/Reportes/reportes.php';
?>