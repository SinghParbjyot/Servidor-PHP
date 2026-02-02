<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Database\BD;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__."./../");
$dotenv->load();
$opcion = $_POST['submit'] ?? null;
$con = BD::getInstance();
$header_html = "";
$msj ="";
session_start();
switch($opcion){
    case 'Login':
        $nombre = $_POST['name'];
        $password = $_POST['password'];

        $resultado = $con->Login($nombre, $password);
        if($resultado === true){
            $_SESSION['usuario'] = $nombre;
            header('location: ../src/sitio.php');
            exit;
        } else {
            $msj = $resultado;
        }
        break;

    case "Register":
        $nombre = $_POST['name'];
        $password = $_POST['password'];
        $exito = $con->Register($nombre, $password);

        if ($exito === true) {
            $_SESSION['usuario'] = $nombre;
            header('location: ../src/sitio.php');
            exit;
        } else {
            $msj = $exito;
        }
        break;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de Acceso</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex justify-center items-center bg-gray-50">

<fieldset class="bg-yellow-200 border-2 border-yellow-300 p-8 rounded-xl shadow-lg w-full max-w-sm">

    <legend class="text-blue-900 text-2xl font-bold px-2 mb-2">Datos de Acceso</legend>

    <form action="index.php" method="post" class="flex flex-col gap-5">

        <div class="flex flex-col space-y-1">
            <label for="name" class="text-blue-900 font-semibold text-sm ml-1">Usuario</label>
            <input type="text" name="name"
                   class="bg-white border border-yellow-400 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 shadow-sm">
        </div>

        <div class="flex flex-col space-y-1">
            <label for="password" class="text-blue-900 font-semibold text-sm ml-1">Password</label>
            <input type="password" name="password"
                   class="bg-white border border-yellow-400 text-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 shadow-sm">
        </div>

        <div class="flex flex-row gap-3 mt-2">
            <input type="submit" name="submit" value="Login"
                   class="flex-1 bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition transform hover:-translate-y-0.5 shadow-md">

            <input type="submit" name="submit" value="Register"
                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition transform hover:-translate-y-0.5 shadow-md">
        </div>

    </form>
</fieldset>
<span class="text-sm text-red-400"><?= "$msj"  ?></span>
</body>

</html>
