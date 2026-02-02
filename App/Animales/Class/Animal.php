<?php


abstract class  Animal
{

    public function __construct(protected int $patas, protected string $especie)
    {

    }

    public function __toString()
    {
        return "Soy $this->especie y tengo $this->patas patas ";
    }

    abstract public function hablar();

}