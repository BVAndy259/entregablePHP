<?php
class Usuario {
    private $idcliente;
    private $nomusuario;
    private $email;
    private $password;
    private $rol;

    public function __construct($idcliente = null, $nomusuario = null, $email = null, $password = null, $rol = null)
    {
        $this->idcliente = $idcliente;
        $this->nomusuario = $nomusuario;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function getIdcliente() { return $this->idcliente; }
    public function setIdcliente($idcliente) { $this->idcliente = $idcliente; }

    public function getNomUsuario() { return $this->nomusuario; }
    public function setNomUsuario($nomusuario) { $this->nomusuario = $nomusuario; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getRol() { return $this->rol; }
    public function setRol($rol) { $this->rol = $rol; }
}
