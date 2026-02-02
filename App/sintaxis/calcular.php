<?php
$operando1 = $_POST['operando'];
$operador = $_POST['operador'];
$operando2 = $_POST['operando2'];
$total = 0;
// Los valido
$operacion = "$operando1 $operador $operando2";
$msj = "";

    if(!is_numeric($operando1) || !is_numeric($operando2)) {
        $msj = "La operacion <span style='color: green'>$operacion</span> no es numerico";

    }
if($operador == "/" && $operando2 == 0) {
    $msj = "La operacion <span style='color: green'>$operacion</span> no es numerico";
}


if($msj == ""){
    $total = match ($operador){
        '+' => $operando1 + $operando2,
        '-' => $operando1 - $operando2,
        '*' => $operando1 * $operando2,
        '/' => $operando1 / $operando2,

    };
}
echo "$operacion =  $total ";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="Calculadora.php"> Volver</a>
</body>
</html>