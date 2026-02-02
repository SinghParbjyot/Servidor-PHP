<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

require_once __DIR__ . '/../DB/vendor/autoload.php';

use Database\BD;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../DB');
$dotenv->load();

$error = "";

if (isset($_POST['submit'])) {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    $bd = BD::getInstance();

    if ($submit === 'Login') {
        $result = $bd->login($nombre, $password);
        if ($result === true) {
            $_SESSION['usuario'] = $nombre;
            header("Location: index.php");
            exit;
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } elseif ($submit === 'Registrar') {
        $result = $bd->register($nombre, $password);
        if ($result === true) {
            $_SESSION['usuario'] = $nombre;
            header("Location: index.php");
            exit;
        } else {
            $error = $result;
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Mastermind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex flex-col justify-center items-center bg-gray-50">

<fieldset class="bg-yellow-200 border-2 border-yellow-300 p-8 rounded-xl shadow-lg w-full max-w-sm">

    <legend class="text-blue-900 text-2xl font-bold px-2 mb-2">Acceso Mastermind</legend>

    <form action="login.php" method="post" class="flex flex-col gap-5">

        <div class="flex flex-col space-y-1">
            <label for="nombre" class="text-blue-900 font-semibold text-sm ml-1">Usuario</label>
            <input type="text" name="nombre" required
                   class="bg-white border border-yellow-400 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 shadow-sm">
        </div>

        <div class="flex flex-col space-y-1">
            <label for="password" class="text-blue-900 font-semibold text-sm ml-1">Contraseña</label>
            <input type="password" name="password" required
                   class="bg-white border border-yellow-400 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 shadow-sm">
        </div>

        <div class="flex flex-row gap-3 mt-2">
            <input type="submit" name="submit" value="Login"
                   class="flex-1 bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition transform hover:-translate-y-0.5 shadow-md">

            <input type="submit" name="submit" value="Registrar"
                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition transform hover:-translate-y-0.5 shadow-md">
        </div>

    </form>
</fieldset>

<?php if (!empty($error)): ?>
    <span class="text-sm text-red-500 font-bold mt-4 bg-red-100 p-2 rounded border border-red-400"><?= $error ?></span>
<?php endif; ?>

</body>
</html>