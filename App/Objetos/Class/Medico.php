<?php
class Medico extends Persona{
    private string $especialidad;
    use Salario;
   public function __construct(string $nombre,string $fecha_nacimiento, string $direccion,string $especialidad, float $salario){
       parent::__construct($nombre,$fecha_nacimiento,$direccion);
       $this->especialidad = $especialidad;
       $this->setSalario($salario);
   }
   public function __toString()
   {
       return   " Soy Medico, especialista en $this->especialidad ".parent::__toString();
   }
}