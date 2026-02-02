<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

unset($_SESSION['clave']);
unset($_SESSION['jugadas']);

$usuario = $_SESSION['usuario'];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego Master Mind</title>
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

<div class="containerIndex">
    <div class="presentacion">
        <h2>DESCRIPCIÓN DEL JUEGO DE MASTER MIND</h2>
        <hr/>
        <ol>
            <li>Esta es una presentación personalizada del juego.</li>
            <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li>
            <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li>
            <li>En total habrá 14 intentos para adivinar la clave.</li>
            <li>En cada jugada la app informará:
                <ul>
                    <li>cuántos colores has acertado de la combinación</li>
                    <li>cuántos de ellos están en la posición correcta.</li>
                </ul>
            </li>
            <li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
        </ol>
        <hr/>
        <form action="jugar.php">
            <input type="submit" value="Empezar a jugar">
        </form>
    </div>
</div>
</body>
</html>