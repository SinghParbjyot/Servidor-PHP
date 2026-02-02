<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Database\BD;
use Dotenv\Dotenv;
use Plantilla\Plantilla;
$dotenv = Dotenv::createImmutable(__DIR__."./../");
$dotenv->load();
$tabla_html = "";
//var_dump($_ENV);
$con = BD::getInstance();
//var_dump($con);


session_start();

$usuario = $_SESSION['usuario']?? null;
if(is_null($usuario)){
    header('location:index.php');
    exit;
}
$header_html = Plantilla::getHeader($usuario,"sitio.php");
$opcion = $_POST['submit'] ?? null;
switch($opcion){
    case "LogOut":
        session_destroy();
        header('location:index.php');
        exit;
        break;

    case "producto":
        $_SESSION['tabla'] = "producto";
        header("location:listado.php");
        exit;
        break;
    case "familia":
        $_SESSION['tabla'] = "familia";
        header("location:listado.php");
        exit;
        break;
    case "usuarios":
        $_SESSION['tabla'] = "usuarios";
        header("location:listado.php");
        exit;
        break;
    case "tienda":
        $_SESSION['tabla'] = "tienda";
        header("location:listado.php");
        exit;
        break;
    case "stock":
        $_SESSION['tabla'] = "stock";
    header("location:listado.php");
    exit;
    break;

    default:
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <?= "$header_html" ?>
</head>
<body>
<fieldset style="background: beige; width: 700px;margin: 10%">
    <legend>Tablas</legend>
    <form action="sitio.php" method="post">
        <?php
        $tablas = $con->getAllTables();
        foreach ($tablas as $tabla) {
            $tabla_html .= "<input type='submit' name='submit' value='$tabla'>";
        }
        ?>
       <button> <?= "$tabla_html" ?></button>
    </form>



</fieldset>

</body>
</html>
