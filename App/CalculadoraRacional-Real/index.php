<?php
$carga = fn($clase) => require "./class/$clase.php";
spl_autoload_register($carga);
/*
 * leer la operacion
 * Mirar el tipo
 * Real
 * Racional
 * Error
 * verificar de que tipo es
 * $tipo_operacion = Operacion::tipo_operacion($cadena);
 *
 * Si es real $operacioReal = new OperacionReal();
 * $resultado = $operacionReal->calcular();
 * Si es Racional $operacioRacional = new OperacionRacional();
 * $resultado = $operacionRacional->calcular();
 */
$resultado = 0;
$operando1 = 0;
$operando2 = 0;
$operador = "";
$tipo_operacion = "";
if (isset($_POST["submit"])) {
    $operacion = $_POST["operacion"] ;
    $tipo_operacion = Operacion::tipo_operacion($operacion);

    switch ($tipo_operacion) {
        case Operacion::REAL:
            $operacion = new OperacionReal($operacion);

            break;
        case Operacion::RACIONAL:
            $operacion = new OperacionRacional($operacion);

            break;
        case Operacion::ERROR:
            $resultado = "Operacion no válida";
            break;
    }
    $resultado = $operacion->operar();
    $operando1 = $operacion->getOp1();
    $operando2 = $operacion->getOp2();
    $operador = $operacion->getOperador();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen"/>
</head>
<body>
<header>
    <h1>Calculadora Real / Racional</h1>
</header>
<aside>
    <fieldset id="ayuda">
        <legend>Reglas de uso de la calculadora</legend>
        <ul>
            <li>La calculadora se usa escribiendo la operación.</li>
            <li>La operación será <strong>Operando_1 operación Operando_2</strong>.</li>
            <li>Cada operando puede ser número <i>positivo</i><strong> real o racional.</strong></li>
            <li>Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong>
                    7/1</strong></li>
            <li>Los operadores reales permitidos son <strong><span class="destacado"> +  -  *  /</span></strong></li>
            <li>Los operadores racionales permitidos son <strong><span class="destacado"> +  -  *  :</span> </strong>
            </li>
            <li>No se deben de dejar espacios en blanco entre operandos y operación</li>
            <li>Si un operando es real y el otro racional se considerará operación racional</label></li>
            <li>Ejemplos:
                <ul>
                    <li>(Real) <strong>5.1+4</strong></li>
                    <li>(Racional) <strong>5/1:2</strong></li>
                    <li>(Error) <strong>5.2+5/1</strong></li>
                    <li>(Error) <strong>52214+</strong></li>
                </ul>
            </li>
        </ul>
    </fieldset>
</aside>
<main>
    <fieldset>
        <legend>Establece la operación</legend>
        <form action="." method="post">
            <label for="operacion">Operación</label>
            <label> <input type="text" name="operacion" id=""><label>
                    <input type="submit" name="submit" value="Calcular">
        </form>
        <?php

        if ($tipo_operacion == -1) {
            echo "<h1>$resultado</h1>";
        }
        ?>
        <?php

        if (isset($_POST['submit']) && $tipo_operacion != -1) :
            ?>
            <fieldset id="rtdo">
                <legend>Resultado</legend>
                <label>
                    <table border="1">
                        <tr>
                            <th>Concepto</th>
                            <th>Valores</th>
                        </tr>

                        <tr>
                            <td>Operando 1</td>
                            <td><?= $operando1 ?></td>
                        </tr>
                        <tr>
                            <td>Operando 2</td>
                            <td><?= $operando2 ?></td>
                        </tr>
                        <tr>
                            <td>Operación</td>
                            <td><?= $operador ?></td>
                        </tr>

                        <tr>
                            <td>Tipo de operación</td>
                            <td>
                                <?=
                                $tipo_operacion == 1 ? "REAL" :
                                        ($tipo_operacion == 2 ? "RACIONAL" :
                                                ($tipo_operacion == -1 ? "ERROR" : "DESCONOCIDO"))
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Resultado</td>
                            <td><?= $resultado ?></td>
                        </tr>
                    </table>
                </label>
            </fieldset>
        <?php endif; ?>
</main>

</body>
</html>
