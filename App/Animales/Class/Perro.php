<?php

class Perro extends Animal
{

    public function __construct()
    {
        parent::__construct(4, "Perro");
    }

    public function hablar()
    {
        return "Guau guauu !! ";
    }
}