<?php
abstract class Operacion
{
    protected  $op1;
    protected  $op2;
    protected   $operador;

    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = -1;

    public function __construct(string $cadena)
    {
        $pos_operador = $this->posicion_operador($cadena);
        $this->op1 = substr($cadena, 0, $pos_operador);
        $this->operador = $cadena[$pos_operador];
        $this->op2 = substr($cadena, $pos_operador + 1);

    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->op1 + $this->operador +$this->op2;
    }
    public function posicion_operador(string $cadena)
    {
        /*
        if(($pos = strpos($cadena, "+")) !== false)
            return $pos;
        if(($pos = strpos($cadena, "-")) !== false)
            return $pos;
        if(($pos = strpos($cadena, "*")) !== false)
            return $pos;
        if(($pos = strpos($cadena, ":")) !== false)
            return $pos;
        if(($pos = strpos($cadena, "/")) !== false)
            return $pos;

*/
        $operadores = "+-*/:";

        for ($i = 0; $i < strlen($operadores); $i++) {
            $c = $operadores[$i];
            $pos = strpos($cadena, $c);
            if ($pos !== false) {
                return $pos;
            }
        }

        return -1;

}
        public static function tipo_operacion($cadena)
        {
            $entero = "[0-9]+";
            $entero1 = "(?:[1-9][0-9]*)";
            $real = "[0-9]+(?:\.[0-9]+)?";
            $racional = "$entero\/$entero1";

            // operadores válidos
            $operadorReal = "[\+\-\*\/]";
            $operadorRacional = "[\+\-\*\:]";
            // ===== REAL =====
            $operacion_real = "^$real$operadorReal$real$";
            if (preg_match("#$operacion_real#", $cadena)) {
                return self::REAL;
            }


            // ===== RACIONAL (4 combinaciones) =====
            $operando_racional = "(?:$entero|$racional)";
            $operacion_racional = "^$operando_racional$operadorRacional$operando_racional$";

            if (preg_match("#$operacion_racional#", $cadena)) {
                return self::RACIONAL;
            }

            return self::ERROR;

        }
        
        abstract  public function operar();

}
?>