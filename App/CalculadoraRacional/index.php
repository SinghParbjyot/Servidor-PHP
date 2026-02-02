<?php
/**
 * Script principal de la Calculadora de Racionales.
 *
 * Este archivo gestiona la interfaz de usuario HTML y procesa
 * el formulario para realizar operaciones con la clase Racional.
 *
 * @package Calculadora
 * @author Parbjyot Singh
 * @version 1.0
 */
require_once("Racional.php");

$msj = "";
$resultado = "";
$simplificado = "";


if(isset($_POST["submit"])){

    $numero = $_POST["operador1"];
    $numero1 = $_POST["operador2"];
    $operando = $_POST["operador"];
   $r1 =  new racional($numero);
   $r2 = new racional($numero1);
    $rtdo = match ($operando) {
        '+'=> $r1->sumar($r2),
        '-'=> $r1->resta($r2),
        '*'=> $r1->multiplicar($r2),
        '/'=> $r1->dividir($r2),

    };
    $resultado = "$r1 $operando $r2 = $rtdo";
    $simplificado = "$rtdo simplificado es ".$rtdo->simplificar();
   /*
    switch ($operando) {
        case"+":
            $suma = $r1->sumar($r2);
            $simplificar = $suma->simplificar();
            echo "$r1 $operando $r2 = $simplificar";
            break;
        case "-":
            $resta = $r1->resta($r2);
            $simplificar = $resta->simplificar();
            echo "$r1 $operando $r2 = $simplificar";
            break;
            case "*":
                $multiplicacion =$r1->multiplicar($r2);
                $simplificar = $multiplicacion->simplificar();
                    echo "$r1 $operando $r2 = $simplificar";
                break;
            case "/":
                $dividir = $r1->dividir($r2);
                $simplificar = $dividir->simplificar();
                echo "$r1 $operando $r2 = $simplificar";
                break;
                default:

    }
   */


}
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
    <h1><?= "$resultado" ?? "" ?></h1>
    <h1><?= "$simplificado" ?? ""  ?></h1>
<fieldset style="background: lightseagreen; width: 700px;margin: 10%">Calculadora
    <form action="index.php" method="post">
        <input type="text" name="operador1" id="">
        <select name="operador" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="operador2" id="">
        <input type="submit" value="Calcular" name="submit">
    </form>
</fieldset>
</body>
</html>
