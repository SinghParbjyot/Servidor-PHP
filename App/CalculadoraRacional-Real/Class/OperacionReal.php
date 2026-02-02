<?php

class OperacionReal extends Operacion{

    public function __construct($cadena){
        parent::__construct($cadena);
        $this->op1 = floatval($this->op1);
        $this->op2 = floatval($this->op2);

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
        $resultado = 0;
    switch($this->operador){

        case "+":
            $resultado =  $this->op1 + $this->op2;
                break;
            case "-":
                $resultado = $this->op1 - $this->op2;
                        break;
                case "*":
                    $resultado = $this->op1 * $this->op2;
                            break;
                    case "/":
                        $resultado = $this->op1 / $this->op2;
                            break;
                        default:
                            $resultado = "Los operadores reales permitidos son + - * /";
                            break;
    }
    return $resultado;
}






}



?>