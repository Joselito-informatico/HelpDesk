<?php
session_start();

class Conectar
{
    private $dbh;

    public function conexion()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=helpdesk_bd";
            $username = "root";
            $password = "";
            $this->dbh = new PDO($dsn, $username, $password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
            return $this->dbh;
        } catch (PDOException $e) {
            // Registrar el error en un archivo de log
            error_log("Error de conexión a la base de datos: " . $e->getMessage(), 3, "error.log");
            die("Error al conectar a la base de datos.");
        }
    }

    public function set_names()
    {
        $this->dbh->query("SET NAMES 'utf8'");
    }

    public function ruta()
    {
        return "http://localhost:80/HelpDesk/";
    }
}

// Crear una instancia de la clase Conectar
$conectar = new Conectar();

// Llamar al método ruta() a través de la instancia
$ruta = $conectar->ruta();
?>