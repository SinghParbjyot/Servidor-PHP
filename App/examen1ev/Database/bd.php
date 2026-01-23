<?php

namespace Database;

use mysqli;
use mysqli_sql_exception;

class Database
{
    private static ?bd $instance = null;
    private ?mysqli $con;
    private string $hostname;
    private string $username;
    private string $password;
    private string $database;

    /**
     *constructor
     */
    private function __construct(
    ) {
        $this->hostname = $_ENV["DB_HOST"];
        $this->username = $_ENV["DB_USER"];
        $this->password = $_ENV["DB_PASSWORD"];
        $this->database = $_ENV["DB_NAME"];

        try {
            $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        } catch(mysqli_sql_exception $e) {
            $this->con = null;
            die ("Error: ".$e->getMessage()."</br>");
        }
    }

    /**
     * @return bd
     */
    public static function getInstance(): bd {
        if(self::$instance ==null){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    /**
     * @param string $usuario
     * @param string $password
     * @return bool|string
     */
    public function registrarse(string $usuario, string $password):bool|string{

        $stmt = $this->con->prepare("INSERT INTO usuarios (nombre, password) VALUES (?, ?)");


        if ($stmt === false) {
            return "Error preparando la consulta: " . $this->con->error;
        }

        $stmt->bind_param("ss", $usuario, $password);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return "No se ha podido insertar el usuario: " . $stmt->error;
            }
        } catch (mysqli_sql_exception $e) {
            return "Error insertando usuario: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }

    /**
     * @param string $usuario
     * @param string $password
     * @return bool|string
     */
    public function login(string $usuario, string $password): bool|string{


        $stmt = $this->con->prepare("SELECT id FROM usuarios WHERE nombre = ? AND password = ?");

        if ($stmt === false) {
            return "Error preparando la consulta: " . $this->con->error;
        }


        $stmt->bind_param("ss", $usuario, $password);

        try {
            if (!$stmt->execute()) {

                return "Error ejecutando la consulta: " . $stmt->error;
            }


            $res = $stmt->get_result();


            if ($res->num_rows === 1) {
                return true;
            } else {
                return "El usuario no existe en la base de datos o credenciales incorrectas.";
            }
        } catch (mysqli_sql_exception $e) {
            return "Error buscando usuario: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
}