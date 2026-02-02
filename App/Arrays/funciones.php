<?php
$productos = [
    'lechuga' => ['unidades' => 200,
        'precio' => 0.90],
    'tomates' =>['unidades' => 2000,
        'precio' => 2.15],
    'cebollas' =>['unidades' => 3200,
        'precio' => 0.49],
    'fresas' =>['unidades' => 4800,
        'precio' => 4.50],
    'manzanas' =>['unidades' => 2500,
        'precio' => 2.10],

];
function mostrarInventario(array $productos){
    $formulario = "<form method='post'>
<table style='border-collapse: collapse; border: 1px solid black;'>
<tr>
    <th style='border: 1px solid black; padding: 5px;'>Verduras</th>
    <th style='border: 1px solid black; padding: 5px;'>Precio</th>
    <th style='border: 1px solid black; padding: 5px;'>Unidades</th>
</tr>";

    foreach ($productos as $producto => $inventario) {
        $precio = $inventario['precio'];
        $unidades = $inventario['unidades'];

        $formulario .= "
<tr>
    <td style='border: 1px solid black; padding: 5px;'>".ucfirst($producto)."</td>
    <td style='border: 1px solid black; padding: 5px;'>$precio</td>
    <td style='border: 1px solid black; padding: 5px;'>$unidades</td>
</tr>";
    }
    $formulario .= "</table>";
    return $formulario;
}
function actualizarInventario(array $productos) : array{
    foreach ($productos as $producto => $p) {
        $unidades = filter_input(INPUT_POST, $producto, FILTER_VALIDATE_INT);


        if ($unidades === null || $unidades === false) {
            continue;
        }

        $unidad = $p['unidades'];
        $productos[$producto]['unidades'] = $unidad - $unidades;
    }

    return $productos;
}
function mostrarFactura( array $productos) : string{
    $prod = "";
    foreach ($productos as $producto => $p) {
        $unidades = filter_input(INPUT_POST, $producto, FILTER_VALIDATE_INT);
        if ($unidades === null || $unidades === false) {
            continue;
        }
        if($unidades != 0) {
            $precio = $p['precio'];

            $total_base = $precio * $unidades;
            $iva = $total_base * 0.21;
            $total = $total_base + $iva;
            $prod .= "Verdura : " . $producto . "<br>" . "Precio : " . $precio . "<br>" . "Unidades : " . $unidades . "<br>" . " Total Base : " . $total_base . "<br>" . " Iva : " . $iva . "<br>" . " Total : " . $total . "<br>";

        }
        }

        return $prod;


}



    function mostrar_formulario(array $productos) :string{
        $formulario = "";
        foreach ($productos as $producto => $p) {
            $formulario .=" <label id='$producto'>".ucfirst($producto)."</label> <input type='text'  name='$producto'  id=''><br>";

        }
        $formulario .="<input type='submit' value='Comprar' name='submit' <br /></input>";
        return $formulario;
}


?>