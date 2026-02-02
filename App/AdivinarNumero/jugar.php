<?php
$opcion = $_POST['submit'] ?? null;
$min = $_POST['min'] ?? null;
$max = $_POST['max'] ?? null;
$numero = $_POST['num'] ?? null;
$jugada = $_POST['jugada'] ?? null;

switch ($opcion) {
    case 'Empezar':
        $intentos = $_POST['intentos'] ?? null;
        $min = 0;
        $max = 2 ** $intentos;
        $jugada = 1;
        $numero = ($min + $max) / 2;
        break;

    case 'Jugar':
        $resultado = $_POST['resultado'] ?? null;
        $intentos = $_POST['intentos'] ?? null;
            if ($jugada >= 10) {
                echo "<h2 style='color:red; text-align:center;'>❌ Has llegado al límite de intentos. ¡Has hecho trampas! ❌</h2>";
                echo "<p style='text-align:center;'><a href='index.php'>Volver al inicio</a></p>";
                exit;
            }
        switch ($resultado) {
            case '>':
                $min = $numero;
                $numero = ($min + $max) / 2;
                $jugada++;
                $intentos--;
                break;

            case '<':
                $max = $numero;
                $numero = ($min + $max) / 2;
                $jugada++;
                $intentos--;
                break;

            case '=':
                $intentos--;
                header('Location: fin.php?jugada=' . $jugada . '&intentos=' . $intentos);
                exit;
        }
        break;
    case 'Reiniciar':
        $intentos = $_POST['intentos'] ?? null;
        $min = 0;
        $max = 2 ** $intentos;
        $jugada = 1;
        $numero = ($min + $max) / 2;
        break;
    case 'Volver':
        header('Location: index.php');
        exit;
    default:
        header('Location: index.php');
        exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica 3 - Juego de Adivinar un Número</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="hero min-h-screen bg-base-200 flex items-center justify-center">
    <div class="max-w-lg bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">Empieza el Juego</h1>
        <p class="text-lg text-gray-600 mb-6">Información y opciones del juego</p>

        <form action="jugar.php" method="POST">
            <div class="bg-slate-300 p-5 rounded-lg mb-4">
                <h4 class="text-2xl font-semibold mb-2">Jugada nº 1</h4>
                <h2 class="text-xl">¿El número es <span class="font-bold">
                        <?= "$numero" ?></span>?</h2>
            </div>

            <input type="hidden" name="intentos" value="<?= htmlspecialchars($intentos) ?>">
            <input type="hidden" name="min" value="<?= htmlspecialchars($min) ?>">
            <input type="hidden" name="max" value="<?= htmlspecialchars($max) ?>">
            <input type="hidden" name="num" value="<?= htmlspecialchars($numero) ?>">
            <input type="hidden" name="jugada" value="<?= htmlspecialchars($jugada) ?>">


            <fieldset id="adivina" class="bg-gray-100 p-4 rounded-lg mb-4">
                <legend class="text-lg font-semibold mb-2">El número a adivinar es</legend>
                <label class="flex items-center mb-2">
                    <input type="radio" checked class="radio radio-primary mr-2" name="resultado"
                           value=">">
                    <span>Mayor</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="radio"  class="radio radio-primary mr-2" name="resultado"
                           value="<">
                    <span>Menor</span>
                </label>
                <label class="flex items-center mb-2">
                    <input type="radio" class="radio radio-primary mr-2" name="resultado" value="=">
                    <span>Igual</span>
                </label>
            </fieldset>

            <div class="flex space-x-4 mt-6">
                <input type="submit" value="Jugar" name="submit" class="btn btn-primary flex-1">
                <input type="submit" value="Reiniciar" name="submit" class="btn btn-secondary flex-1">
                <input type="submit" value="Volver" name="submit" class="btn btn-accent flex-1">
            </div>
        </form>
    </div>
</div>
</body>
</html>

