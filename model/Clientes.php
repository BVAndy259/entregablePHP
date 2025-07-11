<?php
    class Clientes {
        private $idcliente;
        private $nombre;
        private $ruc;
        private $email;
        private $telefono;
        private $representante;

        public function getIdcliente()
        {
                return $this->idcliente;
        }

        public function setIdcliente($idcliente)
        {
                $this->idcliente = $idcliente;
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

        public function getRuc()
        {
                return $this->ruc;
        }

        public function setRuc($ruc)
        {
                $this->ruc = $ruc;
                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;
                return $this;
        }

        public function getTelefono()
        {
                return $this->telefono;
        }

        public function setTelefono($telefono)
        {
                $this->telefono = $telefono;
                return $this;
        }

        public function getRepresentante()
        {
                return $this->representante;
        }

        public function setRepresentante($representante)
        {
                $this->representante = $representante;
                return $this;
        }
    }
?>