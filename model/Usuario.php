<?php
    class Usuario {
        private $idcliente;
        private $nomusuario;
        private $email;
        private $password;
        private $rol;

        public function getIdcliente()
        {
                return $this->idcliente;
        }

        public function setIdcliente($idcliente)
        {
                return $this->idcliente = $idcliente;
        }

        public function getNomUsuario()
        {
                return $this->nomusuario;
        }

        public function setNomUsuario($nomusuario)
        {
                return $this->nomusuario = $nomusuario;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                return $this->email = $email;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                return $this->password = $password;
        }

        public function getRol()
        {
                return $this->rol;
        }

        public function setRol($rol)
        {
                return $this->rol = $rol;
        }
    }
?>