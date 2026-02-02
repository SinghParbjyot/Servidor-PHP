
<!---->
<!--     Obtengo el valor como dos digitos hexadecimales, si solo hubiera uno insertamos un 0 a la izquierda-->
<!--    -->
<!--    $size = rand(1,6);-->
<!--    $red = rand(0,255);-->
<!--    $red_hex = dechex($red);-->
<!--    if(strlen($red_hex)!= -1)-->
<!--    $red = "0".$red_hex;-->
<!---->
<!--    $green = rand(0,255);-->
<!--    $green_hex = dechex($green);-->
<!--    if(strlen($green_hex)!= -1)-->
<!--        $green = "0".$green_hex;-->
<!---->
<!--    $size = rand(1,6);-->
<!--    $blue = rand(0,255);-->
<!--    $blue_hex = dechex($blue);-->
<!--    if(strlen($blue_hex)!= -1)-->
<!--        $blue = "0".$blue_hex;-->
<!---->
<!--    echo "<h$size style='color: #$red_hex$green_hex$blue_hex;'>Texto cambia de color</h$size>";-->
<!---->
<!--    const IVA = 0.21;-->
<!---->
<!--    echo "<h1>Valor actual del IVA es ".IVA."</h1>";-->
<!--    $total = 125 *(1+IVA);-->
<!--    define("IVA_BASE",0.10);-->
<!--    $total_base = 125 *(1+IVA_BASE);-->
<!--    echo "<h1>Valor Total ".$total."</h1>";-->
<!--    echo "<h1>Valor actual del IVA es ".$total_base."</h1>"-->
<!--    -->
<!--    Codigo correspondiente al controlador-->
<!--     Toda la lógica que genere valores pero nunca imprimes texto-->





    <?php
//Escribimos aquí todo el php correspondiente al controlador
//Instrucciones y lógica necesarias queno visualizan valor,lo generan
$numero = rand(20,100);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP en HTML</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h2>Par o impar</h2>
        <ul>
            <li>Items enunciado</li>
            <li>...</li>
        </ul>
    </div>

    <!-- Sección para el resultado de PHP -->
    <div class="box">
        <h2>Resultado</h2>
        <hr>
        <!--Esposible que aquí también tengamos
        html intercaladocon php-->
        <?php

        if ($numero % 2 == 0){?>
            <div style='color: blue'>
            <h1>esta es la seccion de par</h1>
            <h1>el número <?="$numero"?> es par</h1>
            <h1>y por eso estoy aqui</h1>
            </div>
        <? }else{ ?>
            <div style='color: red'>
            <h1>esta es la seccion de impar</h1>
            <h1>el número <?="$numero"?> es impar</h1>
            <h1>y por eso estoy aqui en impar</h1>
            </div>
           <? }
        //Código php
        ?>
    </div>

</div>
</body>
</html>
