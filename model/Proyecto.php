<?php
    class Proyecto {
        private $idproyecto;
        private $nombre;
        private $descripcion;
        private $estado;
        private $idcliente;
        private $nombreCliente;

        public function getIdproyecto()
        {
                return $this->idproyecto;
        }

        public function setIdproyecto($idproyecto)
        {
                return $this->idproyecto = $idproyecto;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                return $this->nombre = $nombre;
        }

        public function getDescripcion()
        {
                return $this->descripcion;
        }

        public function setDescripcion($descripcion)
        {
                return $this->descripcion = $descripcion;
        }

        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado)
        {
                return $this->estado = $estado;
        }

        public function getIdcliente()
        {
                return $this->idcliente;
        }

        public function setIdcliente($idcliente)
        {
                return $this->idcliente = $idcliente;
        }

        public function getNombreCliente()
        {
                return $this->nombreCliente;
        }

        public function setNombreCliente($nombreCliente)
        {
                return $this->nombreCliente = $nombreCliente;
        }
    }
?>