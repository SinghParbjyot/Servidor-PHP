<?php
$opcion = $_POST['submit']??"";

$msj = match ($opcion) {
    "Acceder" => "Has presionado el boton Acceder",
    "Listar" => "Has presionado el boton Listar",
    "Cancelar" => "Has presionado el boton Cancelar",
    "Cerrar" => "Has presionado el boton Cerrar",
    default => "Has accedido por la URL directamente",
};


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
    <h1> <?= "$msj" ?></h1>
</body>
</html>
