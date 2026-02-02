<?php
    $edad = rand(1,200);
    switch ($edad) {
        case ($edad < 3):
            $msj ="Eres un bebe";
            break;
            case ( $edad < 11):
                $msj ="Eres un niño";
                break;
                case ( $edad < 17):
                    $msj = "Eres un adolescente";
                    break;
                    case ($edad < 30):
                        $msj = "Eres un Joven";
                        break;
                        case ($edad < 60):
                            $msj = "Eres un Adulto";
                            break;
                            case ($edad < 90):
                                $msj = "Eres un Experto";
                                break;
                                case ($edad < 120):
                                    $msj = "Eres un Viejo";
        default:
            $msj = "Eres un perro";
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
<div style='color: turquoise'>
<h1> <?= "$msj" ?> y tu edad es <?= "$edad" ?></h1>
</div>
</body>
</html>

<?php
$mes = rand(1,12);
$msj = match($mes) {
    1=> "Enero",
    2=> "Febrero",
    3=> "Marzo",
    4=> "Abril",
    5=> "Mayo",
    6=> "Junio",
    7=> "Julio",
    8=> "Agosto",
    9=> "Septiembre",
    10=> "Octubre",
    11=> "Noviembre",
    12=> "Diciembre",
    default=> "No existe"
};


?>
<?php
$numero = 0;
$suma = 0;
$contador = 0;
while ($contador < 100) {
    if($numero % 2 == 0){
        $suma = $suma + $numero;
        $contador++;
    }
    $numero++;
}
echo $suma;
while ($contador < 100) {
        $suma = $suma + $numero;
        $numero+=+2;
        $contador++;

    }
echo $suma;
$total = 0;
for ($i = 0; $i < 100; $i++) {
    $total = $total + $i;
}
echo $total;


while ($contador < 100);

$contador1 = 0;
$contador2 = 0;
$contador3 = 0;
$contador4 = 0;
$contador5 = 0;
$contador6 = 0;
$total = 0;
for ($i = 0; $i < 1000; $i++) {
    $random = rand(1,6);
    switch ($random) {
        case 1:
            $contador1++;
            break;
        case 2:
            $contador2++;

            break;
        case 3:
            $contador3++;

            break;
        case 4:
            $contador4++;

            break;
        case 5:
            $contador5++;

            break;
        case 6:
            $contador6++;

            break;
        default:

            break;


    }
}
echo"<h1 style='color: red' >Número de veces del 1 = $contador1</h1>\n";
echo"<h1 style='color: blue' >Número de veces del 2 = $contador2</h1\n>";
echo"<h1 style='color: mediumvioletred' >Número de veces del 3 = $contador3</h1>\n";
echo"<h1 style='color: black' >Número de veces del 4 = $contador4</h1>\n";
echo"<h1 style='color: darkblue' >Número de veces del 5 = $contador5</h1>\n";
echo"<h1 style='color: aqua' >Número de veces del 6 = $contador6</h1>\n";

$texto =<<<FIN
Select * from personas;
FIN;

?>
