<?php
    class Usuarios {
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
                $this->idcliente = $idcliente;
                return $this;
        }

        public function getNomUsuario()
        {
                return $this->nomusuario;
        }

        public function setNomUsuario($nomusuario)
        {
                $this->nomusuario = $nomusuario;
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

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;
                return $this;
        }

        public function getRol()
        {
                return $this->rol;
        }

        public function setRol($rol)
        {
                $this->rol = $rol;
                return $this;
        }
    }
?>