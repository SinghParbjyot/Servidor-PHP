<?php
$a = rand(1,100);
$b = rand(1,100);
// Dados dos números quiero obtener el mcd de ellos usando el metodo de euclides
// funcion Tradicional
function mcd($a , $b){
    $resto = $a % $b;
    while($b != 0) {
            $resto = $a % $b;
            $a = $b;
            $b = $resto;

    }
    return $a;
}

$mcd1 = mcd($a, $b);
echo "El maximo comun Divisor entre ",$a," y ",$b," es $mcd1";
function mcd_Recursivo(int $a , int $b){
    return $b == 0 ? $a : mcd_Recursivo($b , $a % $b);
}
$mcd2 = mcd_Recursivo($a, $b);
echo "<br>El maximo comun Divisor entre ",$a," y ",$b," es $mcd2";
function  mcd1($a , $b){
    $c = min($a,$b);
    $maximo = 1;
    for( $i =  1; $i <= $c;$i++ ){
        if( $a % $i == 0  && $b % $i == 0  ){
            $maximo = $i;
        }
    }
    return $maximo;
}

$mcd3 = mcd1($a, $b);
echo "<br>El maximo comun Divisor entre ",$a," y ",$b," es $mcd3";
?>