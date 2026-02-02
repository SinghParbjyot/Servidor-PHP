<?php
$msj = "";
$accesos = $_POST['accesos'] ?? [];

if(isset($_POST['submit'])){
    // Leo Datos
    $nombre = $_POST['nombre'];
    //Realizo Calculos
    //isset ($accesos[$nombre])? ++$accesos[$nombre]:$accesos[$nombre] = 1;
  if(isset($accesos[$nombre])){
      $accesos[$nombre]++;
  }else {
      $accesos[$nombre] = 1;
  }

  foreach ($accesos as $usuario => $clicks) {
      $msj.="<h1> $usuario ha realizado $clicks clicks</h1>";
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

<fieldset style="background: lightseagreen; width: 1000px;margin: 10%">
    <legend> Datos de Acceso </legend>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Nombre <input type="text"  value="<?= $nombre ?? ''  ?>" name="nombre"  id="">
        Acceder <input type="submit" name="submit" value="Acceder">
        <?php
        foreach ($accesos as $usuario => $clicks) {
            echo "<input type='hidden' name='accesos[$usuario]' value='$clicks' />";
        }

        ?>
    </form>
</fieldset>

<?= "$msj" ?? "" ?>
</body>
</html>
