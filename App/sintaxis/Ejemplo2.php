<?php
$num = 128;
$num_bin = 0b101;
$num_oct = 067776;
$num_hex = 0xAbc12ab;
$num_largo= 125-443-133-452;
$num_cientifico = 1E-9;
    echo "<h1>$num</h1>";
    echo "<h1>$num_bin</h1>";
    echo "<h1>$num_oct</h1>";
    echo "<h1>$num_hex</h1>";
    echo "<h1>$num_largo</h1>";
    echo "<h1>$num_cientifico</h1>";
    $num_bin = decbin($num);
?>
<html lang="es">

<head>


</head>
<body>

<h1>Tabla con diferentes notaciones</h1>
</body>
<table>
    <tr>
        <th>Número_Dec</th>
        <th>Número_Bin</th>
        <th>Número_oct</th>
        <th>Número_hex</th>
    </tr>
    <?php
    for ($i = 0; $i <= 50; $i++) {
        $num_bin1 =  decbin($i);
        $num_hex1 = dechex($i);
        $num_oct1 = decbin($num_oct);

        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$num_bin1</td>";
        echo "<td>$num_oct1</td>";
        echo "<td>$num_hex1</td>";
        echo "</tr>";
    }


    ?>

</table>

</html>
