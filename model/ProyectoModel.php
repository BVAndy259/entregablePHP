<?php
    require_once __DIR__ . '/../config/DB.php';
    require_once __DIR__ . '/../model/ClienteModel.php';

    class ProyectoModel {
        private $db;

        public function __construct() {
            $this->db = DB::conectar();
        }

        public function cargar() 
        {
            $sql = "SELECT idProyecto, nomProyecto, descripcion, estado, idCliente FROM proyectos";
            $ps = $this->db->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchall();
            $proyectos = array();
            foreach ($filas as $f) {
                $pro = new Proyecto();
                $pro->setIdproyecto($f[0]);
                $pro->setNombre($f[1]);
                $pro->setDescripcion($f[2]);
                $pro->setEstado($f[3]);
                $pro->setIdcliente($f[4]);
                array_push($proyectos, $pro);
            }
            return $proyectos;
        }

        public function guardar(Proyecto $proyecto)
        {
            $sql = "INSERT INTO proyectos (nomProyecto, descripcion, estado, idCliente) VALUES (:nom, :des, :est, :idcli)";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $proyecto->getNombre());
            $ps->bindParam(':des', $proyecto->getDescripcion());
            $ps->bindParam(':est', $proyecto->getEstado());
            $ps->bindParam(':idcli', $proyecto->getIdcliente());
            $ps->execute();
        }

        public function modificar(Proyecto $proyecto)
        {
            $sql = "UPDATE proyecto SET nomProyecto = :nom, descripcion = :des, estado = :est, idCliente = :idcli WHERE idProyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $proyecto->getNombre());
            $ps->bindParam(':des', $proyecto->getDescripcion());
            $ps->bindParam(':est', $proyecto->getEstado());
            $ps->bindParam(':idcli', $proyecto->getIdcliente());
            $ps->bindParam(':id', $proyecto->getIdproyecto());
            $ps->execute();
        }
    }
?>