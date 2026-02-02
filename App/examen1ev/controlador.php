<?php

use examen1ev\clases\Clave;
use examen1ev\clases\Jugada;



$carga = function($clase) {

    $clase = str_replace('\\', '/', $clase);
    $partes = explode('/', $clase);
    $nombreArchivo = end($partes);

    $ruta = __DIR__ . "/clases/$nombreArchivo.php";

    if (file_exists($ruta)) {
        require_once $ruta;
    }
};
spl_autoload_register($carga);

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$clave = Clave::obtener_clave();
$mostrar_ocultar_clave = "Mostrar Clave";
$informacion = "";
/**
 * @param Jugada $jugada
 * @return void
 */
function evaluar_fin_juego(Jugada $jugada)
{
    if ($jugada->get_posiciones_acertadas() == 4) {
        header("location:fin.php?win=true");
        exit;
    }

    $jugadas = $_SESSION['jugadas'] ?? [];
    if (count($jugadas) >= 14) {
        header("location:fin.php?win=false");
        exit;
    }
}

$opcion = $_POST['submit'] ?? "";

switch ($opcion) {
    case "Mostrar Clave":
        $mostrar_ocultar_clave = "Ocultar Clave";
        $informacion = Clave::get_clave();
        break;
    case "Ocultar Clave":
        $mostrar_ocultar_clave = "Mostrar Clave";
        break;
    case "Jugar":
        if (isset($_POST['combinacion'])) {
            $jugada = new Jugada($_POST['combinacion']);
            if (!isset($_SESSION['jugadas'])) $_SESSION['jugadas'] = [];

            $_SESSION['jugadas'][] = serialize($jugada);
            evaluar_fin_juego($jugada);
            $informacion = Jugada::obtener_historico_jugadas();
        }
        break;
    case "Resetear la Clave":
        unset($_SESSION['clave']);
        unset($_SESSION['jugadas']);
        Clave::obtener_clave();
        header("Location: jugar.php");
        exit;
}
?>