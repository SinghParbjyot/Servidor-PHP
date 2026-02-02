<?php
require_once 'funciones.php';

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

] ;
 $formulario = mostrar_formulario($productos);
if(isset($_POST['submit'])){

    $factura = mostrarFactura($productos);


    echo $factura;


    $actualizar = actualizarInventario($productos);
    $inventario = mostrarInventario($actualizar);
    echo $inventario;
}


?>
<fieldset style="background: deepskyblue; ;margin: 10%">
    <legend> Tienda Online </legend>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <h1><?= "$formulario" ?></h1>
    </form>
</fieldset>