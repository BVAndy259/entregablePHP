# Sistema de Gestión TecnoSoluciones

Un sistema web completo para la gestión de clientes y proyectos desarrollado en PHP con arquitectura MVC y base de datos MySQL.

## 🚀 Características

- **Gestión de Usuarios**: Sistema de autenticación con roles (Admin/Usuario)
- **Gestión de Clientes**: CRUD completo para administrar información de clientes
- **Gestión de Proyectos**: Administración de proyectos con estados y asignación a clientes
- **Reportes**: Generación de reportes por cliente y por proyecto
- **Arquitectura MVC**: Separación clara de responsabilidades
- **Interfaz Web**: Interfaz responsive y fácil de usar

## 📋 Requisitos del Sistema

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)
- Extensión PDO para PHP

## 🛠️ Instalación

### 1. Clonar el repositorio
```bash
git clone [URL_DEL_REPOSITORIO]
cd tecnosoluciones
```

### 2. Configurar la base de datos
1. Crear una base de datos llamada `tecnosoluciones`
2. Ejecutar el script SQL ubicado en `assets/script.sql`

```sql
-- Crear la base de datos
CREATE DATABASE tecnosoluciones;
USE tecnosoluciones;

-- Ejecutar el contenido de assets/script.sql
```

### 3. Configurar la conexión
Editar el archivo `config/DB.php` con los datos de tu base de datos:

```php
$url = "mysql:host=localhost;dbname=tecnosoluciones";
$user = "tu_usuario";
$password = "tu_contraseña";
```

### 4. Configurar servidor web
Configurar el documento root hacia la carpeta del proyecto o usar el servidor integrado de PHP:

```bash
php -S localhost:8000
```

## 🗂️ Estructura del Proyecto

```
tecnosoluciones/
├── assets/
│   └── script.sql              # Script de base de datos
├── config/
│   └── DB.php                  # Configuración de conexión
├── controller/
│   ├── ClienteController.php   # Controlador de clientes
│   ├── ProyectoController.php  # Controlador de proyectos
│   ├── ReporteController.php   # Controlador de reportes
│   └── UsuarioController.php   # Controlador de usuarios
├── model/
│   ├── Cliente.php             # Modelo de Cliente
│   ├── ClienteModel.php        # Modelo de datos de Cliente
│   ├── Proyecto.php            # Modelo de Proyecto
│   ├── ProyectoModel.php       # Modelo de datos de Proyecto
│   ├── Usuario.php             # Modelo de Usuario
│   └── UsuarioModel.php        # Modelo de datos de Usuario
├── view/
│   ├── Clientes/               # Vistas de clientes
│   ├── Proyectos/              # Vistas de proyectos
│   ├── reportes/               # Vistas de reportes
│   └── login.php               # Vista de login
├── index.php                   # Página principal/login
├── dashboard.php               # Panel principal
├── indexClientes.php           # Controlador frontal de clientes
├── indexProyectos.php          # Controlador frontal de proyectos
├── indexReportes.php           # Controlador frontal de reportes
└── logout.php                  # Cerrar sesión
```

## 🔑 Credenciales por Defecto

El sistema incluye usuarios predeterminados:

| Usuario | Email | Contraseña | Rol |
|---------|-------|------------|-----|
| Juan Pérez | juan@email.com | juan123 | admin |
| Maria Álvarez | maria@email.com | maria123 | admin |

## 💻 Uso del Sistema

### Iniciar Sesión
1. Acceder a `index.php`
2. Ingresar credenciales
3. Ser redirigido al dashboard

### Gestión de Clientes
- **Listar**: Ver todos los clientes registrados
- **Crear**: Agregar nuevo cliente con información completa
- **Editar**: Modificar información existente
- **Eliminar**: Remover cliente del sistema

### Gestión de Proyectos
- **Listar**: Ver todos los proyectos con su estado
- **Crear**: Crear nuevo proyecto asignado a un cliente
- **Editar**: Modificar información y estado del proyecto
- **Eliminar**: Remover proyecto del sistema

### Estados de Proyectos
- **Pendiente**: Proyecto en espera de inicio
- **En progreso**: Proyecto en desarrollo
- **Completado**: Proyecto finalizado

### Reportes
- **Reporte por Cliente**: Muestra información del cliente y sus proyectos
- **Reporte por Proyecto**: Muestra información del proyecto y cliente asignado
- **Funcionalidad de Impresión**: Generar PDF o imprimir directamente

## 🏗️ Arquitectura MVC

### Modelos (Model)
- Representan la estructura de datos
- Contienen la lógica de negocio
- Interactúan con la base de datos

### Vistas (View)
- Interfaz de usuario en HTML/PHP
- Presentan la información al usuario
- Formularios para entrada de datos

### Controladores (Controller)
- Coordinan entre modelos y vistas
- Manejan la lógica de la aplicación
- Procesan las peticiones HTTP

## 🔧 Características Técnicas

- **Patrón MVC**: Arquitectura bien estructurada
- **PDO**: Conexión segura a base de datos
- **Sesiones PHP**: Manejo de autenticación
- **Prepared Statements**: Prevención de inyección SQL
- **Validación de Datos**: Validación tanto en frontend como backend

## 🔒 Seguridad

- Autenticación mediante sesiones
- Validación de entrada de datos
- Uso de prepared statements
- Escape de caracteres HTML
- Control de acceso por roles

## 📊 Base de Datos

### Tablas Principales

**usuarios**
- `idUsuario` (PK, AUTO_INCREMENT)
- `nomUsuario` (VARCHAR(50))
- `email` (VARCHAR(100), UNIQUE)
- `password` (VARCHAR(100))
- `rol` (ENUM: 'Admin', 'Usuario')

**clientes**
- `idCliente` (PK, AUTO_INCREMENT)
- `nomCliente` (VARCHAR(100))
- `ruc` (VARCHAR(8))
- `email` (VARCHAR(100))
- `telefono` (VARCHAR(20))
- `representante` (VARCHAR(255))

**proyectos**
- `idProyecto` (PK, AUTO_INCREMENT)
- `nomProyecto` (VARCHAR(100))
- `descripcion` (TEXT)
- `estado` (ENUM: 'Pendiente', 'En progreso', 'Completado')
- `idCliente` (FK)

## 🚀 Futuras Mejoras

- [ ] Implementar hash de contraseñas
- [ ] Agregar paginación en listados
- [ ] Mejorar diseño responsive
- [ ] Implementar logs de auditoría
- [ ] Agregar validación JavaScript
- [ ] Implementar filtros de búsqueda
- [ ] Agregar exportación a Excel
- [ ] Notificaciones por email

## 🤝 Contribución

1. Fork el proyecto
2. Crear rama para nueva funcionalidad (`git checkout -b feature/nueva-funcionalidad`)
3. Commit los cambios (`git commit -am 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crear Pull Request
