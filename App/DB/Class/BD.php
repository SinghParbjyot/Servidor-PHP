<?php
namespace  Database;
use mysqli;
use mysqli_sql_exception;

Class BD{
    private string $user;
    private string $password;
    private string $host;
    private string $db;
    private mysqli $con;
    private static ?BD $instance=null;
    private function __construct(){
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['PASSWORD'];
        $this->host = $_ENV['HOST'];
        $this->db = $_ENV['DATABASE'];
        try{
            $this->con = new mysqli($this->host, $this->user, $this->password, $this->db);
        }catch (mysqli_sql_exception $e){
            die("ERROR DE CONEXION ".$e->getMessage());
        }
    }
    public static function getInstance(): BD{
        if(is_null(self::$instance))
            self::$instance = new BD();
            return self::$instance;

    }
    public function getAllTables() : array{
        $setencia = "SHOW TABLES";
        $resultado = $this->con->query($setencia);
        $fila = $resultado->fetch_row();
        while($fila){
            $tables[] = $fila[0];
            $fila = $resultado->fetch_row();
        }
        return $tables;
    }
    public function getTable(string $table) : array{
        $filas =[];
        $setencia = "Select * from  $table";
        $resultado = $this->con->query($setencia);
        $fila = $resultado->fetch_assoc();
        while($fila){
            $filas[] = $fila;
            $fila = $resultado->fetch_row();
        }

        return $filas;

    }
    public function getFieldName(string $table) : array{
        $setencia = "DESC  $table ";
        $resultado = $this->con->query($setencia);
        $fila = $resultado->fetch_row();
        while($fila){
            $filas[] = $fila[0];
            $fila = $resultado->fetch_row();
        }
        return $filas;

    }

    /**
     * @param string $usuario
     * @param string $password
     * @return bool | string con el error ed la no insercion
     */
    public function register (string $usuario, string $password) : bool | string{
        try {
            $setencia = "INSERT INTO usuarios (nombre, password) VALUES ('$usuario', '$password')";
            $resultado = $this->con->query($setencia);
            if ($resultado) {
                return true;
            }
            return "No se ha podido insertar el usuario";
        }catch (mysqli_sql_exception $e){
            return "No  se ha podido registrar el usuario: ".$e->getMessage();
        }
    }
    public function login (string $name, string $password) : bool | string{
        try {
            $setencia = "SELECT * FROM usuarios WHERE nombre = ? AND password = ? ";
            $stmnt = $this->con->prepare($setencia);
            $stmnt->bind_param("ss", $name, $password);
            $stmnt->execute();
            $stmnt->store_result();
            if ($stmnt->num_rows > 0) {
               return true;
            }
            return "Error en la base de datos";
        }catch (mysqli_sql_exception $e){
            return "Error insertando usuario:$name ".$e->getMessage();
        }
        return false;
    }
    public function eliminar(string $table,int $id) : bool{
        try {


            $setencia = "DELETE FROM $table WHERE id = $id";
            $resultado = $this->con->query($setencia);
            if ($resultado) {
                return true;
            }
        }catch (mysqli_sql_exception $e){
            die("ERROR Al ELIMINAR FILA ".$e->getMessage());
        }
        return false;

    }
    public function modificarAtributo(string $table,int $id, string $atributo,string $valorNuevo) : bool{
        try {


            $setencia = "UPDATE $table SET $atributo = $valorNuevo WHERE id = $id ";
            $resultado = $this->con->query($setencia);
            if ($resultado) {
                return true;
            }
        }catch (mysqli_sql_exception $e){
            die("ERROR AL MODIFICAR FILA ".$e->getMessage());
        }
        return false;

    }

}