<html lang="es">

<head>


</head>
<body>

<h1>Lista de codigo ASCII</h1>
</body>
<table>
<tr>
    <th>Número</th>
    <th>Código</th>
</tr>
        <?php
        for ($i = 33; $i <= 126; $i++) {
            $char = chr($i);
            echo "\n<tr>\n";
            echo "\t\t<td>$i</td>\t\t";
            echo "\n<td>$char</td>\n";
            echo "\n</tr>\n";
        }


        ?>

</table>

</html>
