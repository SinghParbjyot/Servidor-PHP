<?php
$option = $_POST["submit"]?? null;
if (!is_null($option)) {
    //Leo datos de entrada
    $nombre = htmlspecialchars(filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING));
    $password = htmlspecialchars(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

    if ($nombre == $password && $nombre != "") {
        header("Location: submit.php?nombre=$nombre");
        exit();
    }else{
        $msj = "Datos incorrectos";
    }

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
<span style ="color: red"> <?= "$msj??" ?></span>
<fieldset style="background: lightseagreen; width: 1000px;margin: 10%">
    <legend> Datos de Acceso </legend>
    <form action="acceso.php" method="post">
        Nombre <input type="text" name="usuario" id=""><br>
        Password <input type="text" name="password" id=""><br>
        Enviar <input type="submit" name="submit" value="Enviar"><br>
    </form>
</fieldset>

</body>
</html>

