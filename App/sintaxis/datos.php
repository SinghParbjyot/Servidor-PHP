<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$direccion=$_POST["direccion"];
echo "Nombre: $nombre <br>";
echo "Apellido: $apellido <br>";
echo "direccion: $direccion<br>";
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$edad = filter_input(INPUT_POST, 'edad', FILTER_SANITIZE_STRING);
$numero = $_POST["numero"];
?>