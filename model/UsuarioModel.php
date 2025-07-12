<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/Usuario.php';

class UsuarioModel {
    private $db;
    
    public function __construct() {
        $this->db = new DB();
    }
    
    // Método para autenticar usuario
    public function autenticarUsuario($email, $password) {
        try {
            $pdo = $this->db->getConnection();
            $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $password]);
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                return new Usuario(
                    $resultado['idUsuario'],
                    $resultado['nomUsuario'],
                    $resultado['email'],
                    $resultado['password'],
                    $resultado['rol']
                );
            }
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    
    // Método para obtener todos los usuarios
    public function obtenerTodosUsuarios() {
        try {
            $pdo = $this->db->getConnection();
            $sql = "SELECT * FROM usuarios";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            $usuarios = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuarios[] = new Usuario(
                    $row['idUsuario'],
                    $row['nomUsuario'],
                    $row['email'],
                    $row['password'],
                    $row['rol']
                );
            }
            return $usuarios;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    
    // Método para agregar nuevo usuario
    public function agregarUsuario($usuario) {
        try {
            $pdo = $this->db->getConnection();
            $sql = "INSERT INTO usuarios (nomUsuario, email, password, rol) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([
                $usuario->getNomUsuario(),
                $usuario->getEmail(),
                $usuario->getPassword(),
                $usuario->getRol()
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>