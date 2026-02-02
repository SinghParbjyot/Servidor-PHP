<?php




require ("Class/Animal.php");
require ("Class/Perro.php");
require ("Class/Gato.php");
require ("Class/Pato.php");
$perro = new Perro();
$gato = new Gato();
$pato = new Pato();
echo $perro->hablar();
echo $gato->hablar();
echo $pato->hablar();


