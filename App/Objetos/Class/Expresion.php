<?php
class Expresion{



    public function __toString(){
        return "$this->{cadena}$this->{expresion}";
    }
    public static function validar(string $expresion, string $cadena) : bool{
        return preg_match("#$expresion#", $cadena);
    }

}