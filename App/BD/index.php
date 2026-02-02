<?php
try {
    $conexion = new mysqli("mysql", "alumno", "alumno", "alumnos");
    var_dump($conexion);
}catch (mysqli_sql_exception $e){
    die ("Error de conexion ".$e->getMessage()." <br>");
}
?>
