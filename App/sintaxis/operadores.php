
<?php
//$a = @(25 + "25 pepe");
//echo"<h1> $a</h1>"
//
//
//$n1 = 128;
//$n2 = 200;
//$and = $n1 & $n2;
//echo"<h2> $n1 x $n2</h2>";
//printf("<h1> %b $ %b = %b </h1>",$n1,$n2,$and);
//
//$logica = TRUE AND FALSE;
//
//if($logica == TRUE){
//    $resultado = "true";
//}ELSE
//    $resultado = "false";
//echo "<H1> TRUE AND FALSE = $resultado</H1>";
//
//$logica = TRUE && FALSE;
//
//if($logica == TRUE){
//    $resultado = "true";
//}ELSE
//    $resultado = "false";
//echo "<H1> TRUE AND FALSE = $resultado</H1>";
//$a = 2 ** 10;
//echo "<h1> 2 <sup> 10 </sup> $a </h1>";
//
//for($i = 0; $i <= 10; $i++) {
//    $potencia = 2    ** $i;
//    echo "<h1> 2 <sup> $i </sup> =  $potencia <br></h1>";
//}
//
//
//$nombre = "SINGH";
//$alias = &$nombre;
//
//$alias = "Daniel";
//echo "<h1> $nombre </h1>";
//function mayusculas( String $nombre):void{
//    echo "<h1>Valor de nombre $nombre </h1>";
//    $nombre = strtoupper($nombre);
//    echo "<h1>Valor de nombre en mayusuculas $nombre</h1>";
//
//}
//$nombre = "Manuel";
//
//mayusculas($nombre);
//echo "<h1>Valor de nombre despues de la funcion $nombre</h1>";
//
//?>






<?php
$msj = null;

if (isset($_POST['submit'])) {
    // Leer y validar con valores por defecto
    $mask_3 = filter_input(INPUT_POST, 'mask_3', FILTER_VALIDATE_INT);
    $mask_2 = filter_input(INPUT_POST, 'mask_2', FILTER_VALIDATE_INT);
    $mask_1 = filter_input(INPUT_POST, 'mask_1', FILTER_VALIDATE_INT);
    $mask_0 = filter_input(INPUT_POST, 'mask_0', FILTER_VALIDATE_INT);

    $ip_3 = filter_input(INPUT_POST, 'ip_3', FILTER_VALIDATE_INT);
    $ip_2 = filter_input(INPUT_POST, 'ip_2', FILTER_VALIDATE_INT);
    $ip_1 = filter_input(INPUT_POST, 'ip_1', FILTER_VALIDATE_INT);
    $ip_0 = filter_input(INPUT_POST, 'ip_0', FILTER_VALIDATE_INT);

    // Cálculo de la red
    $red_3 = $mask_3 & $ip_3;
    $red_2 = $mask_2 & $ip_2;
    $red_1 = $mask_1 & $ip_1;
    $red_0 = $mask_0 & $ip_0;

    // Generar mensaje
    $msj  = sprintf("<h3>IP: %d.%d.%d.%d (%08b.%08b.%08b.%08b)</h3>", $ip_3, $ip_2, $ip_1, $ip_0, $ip_3, $ip_2, $ip_1, $ip_0);
    $msj .= sprintf("<h3>Máscara: %d.%d.%d.%d (%08b.%08b.%08b.%08b)</h3>", $mask_3, $mask_2, $mask_1, $mask_0, $mask_3, $mask_2, $mask_1, $mask_0);
    $msj .= sprintf("<h3>Red: %d.%d.%d.%d (%08b.%08b.%08b.%08b)</h3>", $red_3, $red_2, $red_1, $red_0, $red_3, $red_2, $red_1, $red_0);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Red</title>
</head>
<body>
<fieldset style="background: lightseagreen; width: 700px; margin: 10%; padding: 20px;">
    <legend><h2>CÁLCULO DE RED</h2></legend>
    <form action="operadores.php" method="post">
        <h3>Máscara</h3>
        <input size="4" type="text" name="mask_3" value="<?= htmlspecialchars($mask_3 ?? 255) ?>">
        <input size="4" type="text" name="mask_2" value="<?= htmlspecialchars($mask_2 ?? 255) ?>">
        <input size="4" type="text" name="mask_1" value="<?= htmlspecialchars($mask_1 ?? 255) ?>">
        <input size="4" type="text" name="mask_0" value="<?= htmlspecialchars($mask_0 ?? 0) ?>">
        <hr>
        <h3>IP</h3>
        <input size="4" type="text" name="ip_3" value="<?= htmlspecialchars($ip_3 ?? 255) ?>">
        <input size="4" type="text" name="ip_2" value="<?= htmlspecialchars($ip_2 ?? 255) ?>">
        <input size="4" type="text" name="ip_1" value="<?= htmlspecialchars($ip_1 ?? 255) ?>">
        <input size="4" type="text" name="ip_0" value="<?= htmlspecialchars($ip_0 ?? 255) ?>">
        <hr>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php if ($msj != null) echo $msj; ?>
</fieldset>
</body>
</html>






