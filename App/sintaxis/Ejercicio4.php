<?php
// Definir algunas variables
$cliente = "Juan Pérez";
$fecha = date("d/m/Y");
$factura_numero = "1";
$producto1 = "Cuadros";
$precio1 = rand(1,100);
$producto2 = "Luminarias intensas";
$precio2 = rand(1,100);
$total_base = $precio1 + $precio2;
$iva = $total_base * 0.21;
$total = $total_base + $iva;

$total_base = number_format($total_base, 2);
$iva = number_format($iva, 2);
$total = number_format($total, 2);
$precio1 = number_format($precio1,2);
$precio2 = number_format($precio2,2);
$ancho = 42;
$titulo = "FACTURA Número: $factura_numero " ;
$identificacion = 42 - strlen($titulo);
str_pad($identificacion, $ancho, "0", STR_PAD_LEFT);

$ticket=<<<FIN
 
<pre>
========================================
    $titulo
========================================
Cliente: $cliente
Fecha: $fecha
    
Productos :
   1. $producto1 $precio1  
   2. $producto2 $precio2
    
Subtotal:             $total_base
IVA(%21):             $iva
  ---------------------------------
Total a pagar: $total$
  

gracias por su compra '$cliente'!
========================================
    
 </pre>
FIN;
echo $ticket;
?>