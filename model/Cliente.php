<?php
    class Cliente {
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
                return $this->idcliente = $idcliente;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                return $this->nombre = $nombre;
        }

        public function getRuc()
        {
                return $this->ruc;
        }

        public function setRuc($ruc)
        {
                return $this->ruc = $ruc;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                return $this->email = $email;
        }

        public function getTelefono()
        {
                return $this->telefono;
        }

        public function setTelefono($telefono)
        {
                return $this->telefono = $telefono;
        }

        public function getRepresentante()
        {
                return $this->representante;
        }

        public function setRepresentante($representante)
        {
                return $this->representante = $representante;
        }
    }
?>