<?php
    class Usuario {
        private $idusuario;
        private $nomusuario;
        private $email;
        private $password;
        private $rol;

        public function getIdusuario()
        {
                return $this->idusuario;
        }

        public function setIdusuario($idusuario)
        {
                $this->idusuario = $idusuario;
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