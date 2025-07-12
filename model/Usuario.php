<?php
class Usuario {
    private $idUsuario;
    private $nomUsuario;
    private $email;
    private $password;
    private $rol;
    
    // Constructor
    public function __construct($idUsuario = null, $nomUsuario = null, $email = null, $password = null, $rol = 'Usuario') {
        $this->idUsuario = $idUsuario;
        $this->nomUsuario = $nomUsuario;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }
    
    // Getters
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function getNomUsuario() {
        return $this->nomUsuario;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getRol() {
        return $this->rol;
    }
    
    // Setters
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    public function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setRol($rol) {
        $this->rol = $rol;
    }
}
?>