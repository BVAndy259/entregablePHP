-- DB para MYSQL
-- Tabla Usuarios
CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nomUsuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    rol ENUM('Admin', 'usuario') DEFAULT 'Usuario'
);

-- Tabla Clientes
CREATE TABLE clientes (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nomCliente VARCHAR(100),
    ruc VARCHAR(8),
    email VARCHAR(100),
    telefono VARCHAR(20),
    representante VARCHAR(255)
);

-- Tabla Proyectos
CREATE TABLE proyectos (
    idProyecto INT AUTO_INCREMENT PRIMARY KEY,
    nomProyecto VARCHAR(100) NOT NULL,
    descripcion TEXT,
    estado ENUM('Pendiente', 'En progreso', 'Completado') DEFAULT 'Pendiente',
    idCliente INT
);

-- Inserciones de datos
-- Usuarios
INSERT INTO usuarios (nomUsuario, email, password, rol) VALUES 
('Juan Pérez', 'juan@email.com', 'juan123', 'admin'),
('Maria Álvarez', 'maria@email.com', 'maria123', 'admin');

-- Clientes
INSERT INTO clientes (nomCliente, ruc, email, telefono, representante) VALUES
('Electro S.A.C.', '20601234567', 'contacto@electro.pe', '987654321', 'Carlos Rodríguez'),
('Inno EIRL', '20459876543', 'ventas@inno.com', '956789123', 'María López');


-- Proyectos
INSERT INTO proyectos (nomProyecto, descripcion, estado, idCliente) VALUES 
('Tienda Web', 'Página Web de productos electrónicos', 'Pendiente', 1),
('Aplicación CRUD', 'Mantenimiento de registros de DB de la empresa', 'En progreso', 2);