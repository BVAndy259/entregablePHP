<?php
    require_once __DIR__ . '/../config/DB.php';
    require_once __DIR__ . '/Proyecto.php';

    class ProyectoModel {
        private $db;

        public function __construct() {
            $this->db = DB::conectar();
        }

        public function cargar() 
        {
            $sql = "SELECT p.idProyecto, p.nomProyecto, p.descripcion, p.estado, p.idCliente, c.nomCliente 
                    FROM proyectos p 
                    LEFT JOIN clientes c ON p.idCliente = c.idCliente";
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
                $pro->setNombreCliente($f[5]);
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
            $sql = "UPDATE proyectos SET nomProyecto = :nom, descripcion = :des, estado = :est, idCliente = :idcli WHERE idProyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $proyecto->getNombre());
            $ps->bindParam(':des', $proyecto->getDescripcion());
            $ps->bindParam(':est', $proyecto->getEstado());
            $ps->bindParam(':idcli', $proyecto->getIdcliente());
            $ps->bindParam(':id', $proyecto->getIdproyecto());
            $ps->execute();
        }

        public function obtenerPorId($id)
        {
            $sql = "SELECT idProyecto, nomProyecto, descripcion, estado, idCliente FROM proyectos WHERE idProyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
            $fila = $ps->fetch();
            
            if ($fila) {
                $pro = new Proyecto();
                $pro->setIdproyecto($fila[0]);
                $pro->setNombre($fila[1]);
                $pro->setDescripcion($fila[2]);
                $pro->setEstado($fila[3]);
                $pro->setIdcliente($fila[4]);
                return $pro;
            }
            return null;
        }

        public function eliminar($id)
        {
            $sql = "DELETE FROM proyectos WHERE idProyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
        }

        // ✅ CORREGIDO: Agregado bindParam
        public function obtenerPorCliente($idCliente) 
        {
            $sql = "SELECT idProyecto, nomProyecto, descripcion, estado, idCliente FROM proyectos WHERE idCliente = :idCliente";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':idCliente', $idCliente); // ← ESTO FALTABA
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
    }
?>