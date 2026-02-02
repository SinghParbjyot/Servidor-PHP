<?php
    $intentos = $_GET['intentos']??null;
    $jugada = $_GET['jugada']??null;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 - Fin del Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200 flex items-center justify-center">
    <div class="max-w-lg bg-white shadow-lg rounded-lg p-8 text-center">
        <fieldset class="border-2 border-gray-300 rounded-lg p-6">
            <legend class="text-2xl font-semibold text-gray-700 mb-4">FIN DEL JUEGO</legend>
            <form action="index.php" method="POST">
                <!-- Mensaje de resultado del juego -->
                <div class='text-xl font-medium text-gray-800 mb-6'><h2>He adivinado el número en <?= " $jugada " ?>jugadas<br>Me han sobrado <?= "$intentos" ?>  intentos</h2></div>                <!-- Botón para volver al inicio -->
                <input type="submit" value="Volver al inicio" class="btn btn-primary w-full py-2 text-lg font-semibold">
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 - Fin del Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200 flex items-center justify-center">
    <div class="max-w-lg bg-white shadow-lg rounded-lg p-8 text-center">
        <fieldset class="border-2 border-gray-300 rounded-lg p-6">
            <legend class="text-2xl font-semibold text-gray-700 mb-4">FIN DEL JUEGO</legend>
            <form action="index.php" method="POST">
                <!-- Mensaje de resultado del juego -->
                <div class='text-xl font-medium text-gray-800 mb-6'><h2>No he adivinado el número en 10 intentos<br>¿No habrás hecho trampa?</h2></div>                <!-- Botón para volver al inicio -->
                <input type="submit" value="Volver al inicio" class="btn btn-primary w-full py-2 text-lg font-semibold">
            </form>
        </fieldset>
    </div>
</div>
</body>
</html>