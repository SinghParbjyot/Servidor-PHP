<?php
$clicks = 0;
$clicks = $_POST['clicks'];
$clicks = (int)$clicks;

if(isset($_POST["submit"])){
    $clicks = $clicks + 1;
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
<h1> <?= "$clicks " ?></h1>
<fieldset style="background: lightseagreen; width: 1000px;margin: 10%">
    <legend> Datos de Acceso </legend>
    <form action="contadorClicks.php" method="post">
         <input type="text" name="clicks"  value="<?= "$clicks" ?>" id=""><br>
        Click <input type="submit" name="submit" value="Click"><br>
    </form>
</fieldset>

</body>
</html>
