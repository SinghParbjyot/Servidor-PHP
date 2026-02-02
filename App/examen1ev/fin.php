<?php

use examen1ev\clases\Clave;
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

$usuario = $_SESSION['usuario'];
$win = isset($_GET['win']) ? ($_GET['win'] === 'true') : false;
if (empty(Clave::obtener_clave())) {
}
$clave = Clave::obtener_clave();
$jugadas = $_SESSION['jugadas'] ?? [];
$intentos = count($jugadas);

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fin del Juego</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
<nav style="background-color: #eee; border-bottom: 2px solid darkblue; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div style="font-size: 1.5em; font-weight: bold; color: darkblue;">
        Juego de Master Mind
    </div>

    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="font-size: 1.1em; color: darkblue; font-weight: bold;">
            Usuario: <span style="color: black;"><?= htmlspecialchars($usuario) ?></span>
        </div>
        <a href="logout.php" style="background-color: #dc3545; color: white; padding: 5px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 0.9em;">Cerrar Sesión</a>
    </div>
</nav>

<h1>RESULTADO DE TU PARTIDA</h1>

<div class="final">
    <?php if ($win): ?>
        <h2>FELICIDADES ADIVINASTE LA CLAVE EN <?= $intentos ?> JUGADAS</h2>
    <?php else: ?>
        <h2>HAS AGOTADO TUS JUGADAS!!!!!</h2>
    <?php endif; ?>

    <h3>Valor de la clave:</h3>
    <div class="fila_resultados">
        <?= Clave::obtener_clave_final_html() ?>
    </div>

    <?php
    $jugadas_gastadas = array_reverse($jugadas, true);
    foreach ($jugadas_gastadas as $i => $jugada_serializada):
        $jugada = unserialize($jugada_serializada);
        $num_jugada = $i + 1;
        ?>
        <h3>Valor de la jugada <?= $num_jugada ?></h3>
        <div class="fila_resultados">
            <?= $jugada->dibujar_fila_final() ?>
        </div>
    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 20px;">
        <form action="index.php">
            <button type="submit" style="font-size: 1.5em; padding: 5px 20px; font-style: oblique; border: 2px solid black; background: white; cursor: pointer;">Volver al Inicio</button>
        </form>
    </div>
</div>
</body>
</html>