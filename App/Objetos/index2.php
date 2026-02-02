<?php
$msj = "";
$carga = fn($clase)=>require "class/$clase.php";
spl_autoload_register($carga);

if(isset($_POST["submit"])) {
    $cadena = filter_input(INPUT_POST, "cadena");
    $expresion = filter_input(INPUT_POST, "expresion");
    $afirmacion = Expresion::validar($expresion, $cadena) ? "Si" : "No";

    $msj = "La cadena es  $cadena $afirmacion cumple $expresion";
}

?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?= "$msj" ?>
<fieldset style="background: beige; width: 700px;margin: 10%">Expresiones Regulares
    <form action="index2.php" method="post">

        Expresion <input type="text" name="expresion" value="<?= $expresion ?? "" ?>"  id=""><br>
        cadena<input type="text" name="cadena" value="<?= $cadena ?? ""  ?>" id="">
        <input type="submit" value="validar" name="submit">
    </form>
</fieldset>

</body>
</html>
