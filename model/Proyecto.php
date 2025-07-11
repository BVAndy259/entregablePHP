<?php
    class Proyecto {
        private $idproyecto;
        private $nombre;
        private $descripcion;
        private $estado;
        private $idcliente;

        public function getIdproyecto()
        {
                return $this->idproyecto;
        }

        public function setIdproyecto($idproyecto)
        {
                $this->idproyecto = $idproyecto;
                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                $this->nombre = $nombre;
                return $this;
        }

        public function getDescripcion()
        {
                return $this->descripcion;
        }

        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;
                return $this;
        }

        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado)
        {
                $this->estado = $estado;
                return $this;
        }

        public function getIdcliente()
        {
                return $this->idcliente;
        }

        public function setIdcliente($idcliente)
        {
                $this->idcliente = $idcliente;
                return $this;
        }
    }
?>