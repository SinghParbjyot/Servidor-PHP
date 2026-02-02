<?php
$nombre = isset($_GET['usuario'])? htmlspecialchars(filter_input(INPUT_GET, "usuario"));
if ($nombre == "") {
    header("location: Acceso.php");
    exit();
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
<h1> Bienvenido a este sitio web <?= "$nombre" ?></h1>
</body>
</html>
