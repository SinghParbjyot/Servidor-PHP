<?php
 $notas = array();
 //Creando e inicializando un array
 $notas_2 = [1,20, 10 =>"Ricardo","Love","PHP"];


 //Crea de nuevo la variable array con el elemento especificado dentro de los corchetes
$notas_2 = [3];
// Añadir un elemento al array en la 1 posicion libre tambien puedes especificar dentro de los corchetes la posicion donde lo quieres añadir
$notas_2 [] = 3;

// Crear un array de 20 notas (0,10)
for ($i=0; $i < 20; $i++) {
    $notas[] = rand(0,10);
}

function inicializa(){
    return rand(1,10);
}

$notas_1 = array_fill(0,20,rand(1,10));
$notas2 =  array_map("inicializa",$notas_1);

$max = max($notas2);
$min = min($notas2);
$numero_notas = count($notas2);  // tamaño del array

$suma = array_sum($notas2);
$max = max($notas2);
$min = min($notas2);
var_dump($notas2);
$media = $suma /$numero_notas;
echo "<br>La nota maxima es = ",$max;
echo "<br>La nota minima es = ",$min;
echo "<br>La nota media es = ",$media;
// en el foreach el valor nose modifica fuera del bucle se debe de referenciar el $value para poder modificar ese
//valor fuera del bucle
foreach ($notas2 as $key => $value) {
    echo"<h1>$value</h1>";
}
?>