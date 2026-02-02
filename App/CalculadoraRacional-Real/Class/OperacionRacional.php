<?php
require "Racional.php";
class  OperacionRacional extends Operacion
{



    public function __construct($cadena)
    {
        parent::__construct($cadena);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);
    }
    public function getOp1(){

    return $this->op1;
    }
    public function getOp2(){
        return $this->op2;

    }
    public function getOperador()
    {
        return $this->operador;
    }


     public function operar(){

        switch ($this->operador) {
            case '+':
                $resultado = $this->op1->sumar($this->op2);
                return $resultado->simplificar();
            case '-':
                $resultado = $this->op1->resta($this->op2);
                return $resultado->simplificar();
            case '*':
                $resultado = $this->op1->multiplicar($this->op2);
                return $resultado->simplificar();
            case ':':
                $resultado = $this->op1->dividir($this->op2);
                return $resultado->simplificar();
            default:
                return "Los operadores racionales permitidos son +, -, *, :";
        }
    }
}
?>

