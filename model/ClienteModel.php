<?php
    require_once __DIR__ . '/../config/DB.php';
    require_once __DIR__ . '/Cliente.php';

    class ClienteModel {
        private $db;

        public function __construct() {
            $this->db = DB::conectar(); // Faltaba inicializar la conexión
        }

        public function cargar() 
        {
            $sql = "SELECT idCliente, nomCliente, ruc, email, telefono, representante FROM clientes";
            $ps = $this->db->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchall();
            $clientes = array();
            foreach ($filas as $f) {
                $cli = new Cliente();
                $cli->setIdcliente($f[0]);
                $cli->setNombre($f[1]);
                $cli->setRuc($f[2]);
                $cli->setEmail($f[3]);
                $cli->setTelefono($f[4]);
                $cli->setRepresentante($f[5]);
                array_push($clientes, $cli);
            }
            return $clientes;
        }

        public function guardar(Cliente $cliente)
        {
            $sql = "INSERT INTO clientes (nomCliente, ruc, email, telefono, representante) VALUES (:nom, :ruc, :ema, :tel, :rep)";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $cliente->getNombre());
            $ps->bindParam(':ruc', $cliente->getRuc());
            $ps->bindParam(':ema', $cliente->getEmail());
            $ps->bindParam(':tel', $cliente->getTelefono());
            $ps->bindParam(':rep', $cliente->getRepresentante());
            $ps->execute();
        }

        public function modificar(Cliente $cliente)
        {
            // Corregido: quitaste el ruc duplicado
            $sql = "UPDATE clientes SET nomCliente = :nom, ruc = :ruc, email = :ema, telefono = :tel, representante = :rep WHERE idCliente = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $cliente->getNombre());
            $ps->bindParam(':ruc', $cliente->getRuc());
            $ps->bindParam(':ema', $cliente->getEmail());
            $ps->bindParam(':tel', $cliente->getTelefono());
            $ps->bindParam(':rep', $cliente->getRepresentante());
            $ps->bindParam(':id', $cliente->getIdcliente());
            $ps->execute();
        }

        public function obtenerPorId($id)
        {
            $sql = "SELECT idCliente, nomCliente, ruc, email, telefono, representante FROM clientes WHERE idCliente = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
            $fila = $ps->fetch();
            
            if ($fila) {
                $cli = new Cliente();
                $cli->setIdcliente($fila[0]);
                $cli->setNombre($fila[1]);
                $cli->setRuc($fila[2]);
                $cli->setEmail($fila[3]);
                $cli->setTelefono($fila[4]);
                $cli->setRepresentante($fila[5]);
                return $cli;
            }
            return null;
        }

        public function eliminar($id)
        {
            $sql = "DELETE FROM clientes WHERE idCliente = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
        }
    }
?>