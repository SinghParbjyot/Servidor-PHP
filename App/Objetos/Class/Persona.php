<?php

class Persona {
    private static $contadorPersonas = 0;

    public function __construct ( protected string $nombre,  protected string $fecha_nacimiento,   protected string $direccion){
           self::$contadorPersonas++;
    }
    public function __toString(){
        return "$this->nombre  $this->fecha_nacimiento  $this->direccion";
    }
    public  function calcularEdad() : int{
        $edad = 0;
        $fecha_nac = $this->fecha_nacimiento;
        $fecha_actual = date ("d-m-y");
         $fecha = $fecha_nac.explode("/", $fecha_nac);
         $año = $fecha[0];
         $mes = $fecha[1];
         $dia = $fecha[2];

        return $edad;
    }
    public static function getContadorPersonas(){
        return self::$contadorPersonas;
    }
    public function __destruct(){
        self::$contadorPersonas--;
    }


}


?>

