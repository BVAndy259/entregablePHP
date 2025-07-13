<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/Usuario.php';

class UsuarioModel {
    private $db;

    public function __construct()
    {
        $this->db = DB::conectar();
    }

    public function validar(Usuario $usuario)
    {
        $sql = "SELECT idUsuario, nomUsuario, password, rol FROM usuarios WHERE email = :email";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":email", $usuario->getEmail());
        $ps->execute();
        $result = $ps->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if ($usuario->getPassword() === $result['password']) {
                return [
                    'idUsuario' => $result['idUsuario'],
                    'nomUsuario' => $result['nomUsuario'],
                    'rol' => $result['rol']
                ];
            }
        }
        return false;
    }

    public function guardar(Usuario $usuario)
    {
        $sql = "INSERT INTO usuarios (nomUsuario, email, password, rol) 
                VALUES (:nom, :email, :pas, :rol)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':nom', $usuario->getNomUsuario());
        $ps->bindParam(':email', $usuario->getEmail());
        $ps->bindParam(':pas', $usuario->getPassword()); // Texto plano
        $ps->bindParam(':rol', $usuario->getRol());
        $ps->execute();
    }
}
