<?php

class Bailarin extends Persona
{
    private string $estilo;

    public function __construct(string $nombre, string $fecha_nacimiento, string $direccion, string $estilo)
    {
        parent::__construct($nombre, $fecha_nacimiento, $direccion);
        $this->estilo = $estilo;
    }

    public function __toString()
    {
        return " Soy Bailarin,  mi estilo de baile es $this->estilo " . parent::__toString();
    }
}