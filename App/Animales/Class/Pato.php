<?php



class Pato extends Animal
{

    public function __construct()
    {
        parent::__construct(4, "Pato");
    }

    public function hablar()
    {
        return "Cuac Cuac!! ";
    }
}