<?php

Trait Salario{
    public function __construct(private float $salario){


    }
    public function getSalario(){
        return $this->salario;
    }
    public function setSalario(float $salario){
        $this->salario = $salario;

    }
}