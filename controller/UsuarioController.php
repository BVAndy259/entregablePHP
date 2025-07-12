<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;
    
    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }
    
    public function login($email, $password) {
        // Validar datos
        if (empty($email) || empty($password)) {
            return [
                'success' => false,
                'message' => 'Por favor, ingrese email y contraseña'
            ];
        }
        
        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Formato de email inválido'
            ];
        }
        
        // Intentar autenticar
        $usuario = $this->usuarioModel->autenticarUsuario($email, $password);
        
        if ($usuario) {
            // Configurar sesión
            $_SESSION['usuario'] = [
                'id' => $usuario->getIdUsuario(),
                'nombre' => $usuario->getNomUsuario(),
                'email' => $usuario->getEmail(),
                'rol' => $usuario->getRol()
            ];
            
            return [
                'success' => true,
                'message' => 'Login exitoso',
                'redirect' => 'dashboard.php'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Email o contraseña incorrectos'
            ];
        }
    }
    
    public function logout() {
        session_destroy();
        return [
            'success' => true,
            'redirect' => 'index.php'
        ];
    }
    
    public function obtenerTodosUsuarios() {
        return $this->usuarioModel->obtenerTodosUsuarios();
    }
    
    public function agregarUsuario($datos) {
        // Validar datos
        if (empty($datos['nomUsuario']) || empty($datos['email']) || empty($datos['password'])) {
            return [
                'success' => false,
                'message' => 'Todos los campos son obligatorios'
            ];
        }
        
        // Crear objeto Usuario
        $usuario = new Usuario(
            null,
            $datos['nomUsuario'],
            $datos['email'],
            $datos['password'],
            $datos['rol'] ?? 'Usuario'
        );
        
        // Intentar agregar
        if ($this->usuarioModel->agregarUsuario($usuario)) {
            return [
                'success' => true,
                'message' => 'Usuario agregado exitosamente'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Error al agregar usuario'
            ];
        }
    }
}
?>