<?php
class  Racional  {
    //atributos
   public int  $num;
   public int $den;
    //metodos
    public function __construct(int | string $num , int $den = 1){
        if(is_string($num)){
            $valores = explode("/", $num);
            $num = $valores[0];
            $den = $valores[1] ?? 1;
            $num = intval($num);
            $den = intval($den);

        }
        $this->num = $num;
        $this->den = $den;


    }
    public function __toString(){
        return $this->num." /".$this->den;
    }
    public function sumar( Racional $op2 ):Racional{
     $den =   $op2->den * $this->den;
     $num = $op2->num * $this->den + $op2->den * $this->num;
     return new Racional($num, $den);
    }
    public function resta( Racional $op2 ):Racional{
        $den =  $op2->den*$this->den;
        $num = $op2->num * $this->den - $op2->den * $this->num;
        return new Racional($num, $den);
    }
    public function multiplicar( Racional $op2 ):Racional{
        $den = $op2->den * $this->den;
        $num = $op2->num * $this->num;
        return new Racional($num, $den);
    }
    public function dividir( Racional $op2 ):Racional | string{
        $den = $op2->den * $this->num;
        $num = $op2->num * $this->den;
        if($den == 0 ){
            return "No se puede dividir entre 0";
        }
        return new Racional($num, $den);
    }
    private function mcd() : int{
        $a = $this->num;
        $b = $this->den;
        while($b != 0) {
            $resto = $a % $b;
            $a = $b;
            $b = $resto;

        }
        return $a;
    }

    public function simplificar():Racional {

        $mcd = $this->mcd();
        $num = $this->num;
        $den = $this->den;
        $num = $num / $mcd;
        $den = $den / $mcd;
        return new Racional($num, $den);
}
}


?>

