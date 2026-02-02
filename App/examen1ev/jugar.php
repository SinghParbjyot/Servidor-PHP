<?php
use examen1ev\clases\Plantilla;

require "controlador.php";

$usuario = $_SESSION['usuario'];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mastermind</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <script>
        function cambia_color(numero) {
            var color = document.getElementById("combinacion" + numero).value;
            var elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>

<nav style="background-color: #2c3e50; border-bottom: 4px solid #1abc9c; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div style="font-size: 1.5em; font-weight: bold; color: #ecf0f1; font-family: 'Segoe UI', sans-serif;">
         Juego de Master Mind
    </div>

    <div style="display: flex; align-items: center; gap: 20px;">
        <div style="font-size: 1em; color: #bdc3c7; font-weight: 500; font-family: sans-serif;">
            Usuario: <span style="color: #1abc9c; font-weight: bold;"><?= htmlspecialchars($usuario) ?></span>
        </div>
        <a href="logout.php" style="background-color: #e74c3c; color: white; padding: 8px 18px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 0.9em; transition: background 0.3s; font-family: sans-serif;">Cerrar Sesión</a>
    </div>
</nav>

<div class="contenedorJugar">
    <div class="opciones">
        <h2> OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value="<?= $mostrar_ocultar_clave?>" name="submit" class="btn-action">
                <input type="submit" value="Resetear la Clave" name="submit" class="btn-danger">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <h3> Selecciona 4 colores para jugar</h3>
                    <?= Plantilla::genera_formulario_juego()?>
                </div>
                <input type="submit" value="Jugar" name="submit" class="btn-primary">
            </form>
        </fieldset>
    </div>

    <fieldset class="informacion">
        <h2> INFORMACIÓN</h2>
        <fieldset class="info-box">
            <legend>Historial y Mensajes</legend>
            <?php
            if (!empty($informacion)) {
                echo "<div class='info-content'>" . $informacion . "</div>";
            } else {
                echo "<h3 class='no-data'>Sin datos que mostrar por el momento</h3>";
            }
            ?>
        </fieldset>
    </fieldset>
</div>
</body>
</html>