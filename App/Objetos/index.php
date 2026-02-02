<?php
$carga = fn($clase)=> require("Class/$clase.php");
spl_autoload_register($carga);
spl_autoload_register(function ($clase) {
    //require "Class/$clase.php";

});

$a = new A();
echo "$a<br>";
$medico = new Medico("Manuel","05/01/1998","Calle Don Juan","Psicologia",4000);
$bailarin = new Bailarin("Juan","05/01/1998","Calle Don Juan","Hip-Hop");
echo "$bailarin<br>";
echo "$medico<br>";
echo "El salario del medico es ".$medico->getSalario()."<br>";
$count = Persona::getContadorPersonas();
$p1 = new Persona("Pedro","09/12/2022","Calle Cervantes");
echo " Creada la persona $p1 y actualmente tengo ".Persona::getContadorPersonas()." Personas <br>";
$p2 = new Persona("Juan","01/01/2000","Calle Jarque Moncayo");
echo " Creada la persona $p2 y actualmente tengo ".Persona::getContadorPersonas()." Personas <br>";
$p3 = new Persona("Luis","25/12/2010","Calle Don Jaime ");
echo " Creada la persona $p3 y actualmente tengo ".Persona::getContadorPersonas()." Personas <br>";
$p4 = new Persona("Ivan","15/12/2001","Calle Juan Perez");
echo " Creada la persona $p4 y actualmente tengo ".Persona::getContadorPersonas()." Personas<br> ";

unset($p3);
echo "Elimino  una persona quedan  ".Persona::getContadorPersonas()." Personas <br>";
UNSET($p4);
echo "Elimino  una persona quedan ".Persona::getContadorPersonas()." Personas <br>";
$p2 = null;
echo Persona::getContadorPersonas()." <br>";


?>
