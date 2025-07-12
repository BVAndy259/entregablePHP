<?php
    class DB {
        public static function conectar() {
            $url = "mysql: host=localhost; dbname=";
            $user = "root";
            $password = "";

            try {
                $cn = new PDO($url, $user, $password);
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $cn;
            } catch (PDOException $e) {
                echo "Error de conexión a la base de datos: " . $e->getMessage();
                return null;
            }
        }
    }
?>