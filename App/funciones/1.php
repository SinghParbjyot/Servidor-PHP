<?php
/*
function mayor( int|string $arg1, int|string $arg2 ):int|string {
    if(is_string($arg1)) {
        $resultado = $arg1 < $arg2 ? $arg1 : $arg2 ;
    }else

    $resultado = $arg1 > $arg2 ? $arg1 : $arg2 ;
    return $resultado;
}


$num1 = 25;
$num2 = 30;
$mayor = mayor($num1, $num2);
echo "Valor Mayor de $num1 y $num2 es = ".$mayor."<br>";
$nombre = "Beatriz";
$nombre1 = "Ana";
$mayor = mayor($nombre, $nombre1);
echo "Valor Mayor de $nombre y $nombre1 es = ".$mayor."<br>";
*/ng|null $num = 1, int |string|null $den = null):string{

    if(is_string($num) && is_null($den)){
        $valores = explode("/", $num);
        return $valores[0] ."/".$valores[1] ?? "1";
    }
    if (is_int($num) && is_int($den)){
        return $num."/".$den;
    }
    if(is_int($num) && is_null($den)){
        return $num."/". 1;
    }
    if(is_null($num)){
        return 1/1;
    }
     return "1/1";
}
$a = racional(1,6);
$b = racional(20);
$c = racional("7/8");
$d = racional();
echo"<h1>($a)</h1>";
echo"<h1>($b)</h1>";
echo"<h1>($c)</h1>";
echo"<h1>($d)</h1>";
$nombre = "pedro";
/*
$mayor_ = fn($a,$b)=> match($a<=>$b){
    1 => "$nombre dice que $a es mayor que $b",
    -1 => "$nombre dice que $a es mayor que $b",
    0 => "$nombre dice que $a es mayor que $b",
}
*/
function factorial($num){
    if($num == 0){
        return 1;
    }else
   return $num * factorial($num - 1);
}
$n = factorial(8);
echo "<h1>el factorial de 8 es $n </h1>";

$factorial_1 = function ($num) use (& $factorial_1){
    return $num == 0? 1 : $num * factorial_1($num - 1);
};

?>