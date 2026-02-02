<?php



class Gato extends Animales
{

    public function __construct()
    {
        parent::__construct(4, "Gato");
    }

    public function hablar()
    {
        return "Miauu Miauu !! ";
    }
}