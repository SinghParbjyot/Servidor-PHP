<?php
//RF1 No se permite dps  contactos con el mismo telefono
//RF2 controlde errores
//RF2.1 No permitir un nombre vacio
//RF2.2 No permitir un telefono no númerico
//RF2.3 No se permite dos contactos con el mismo telefono
//RF2.4 no permitir telefono vacio de un contacto que no existe
//RF 1 si no hay errores
//RF1.1 si nombre y telefono
// RF 1.1.1 Si nombre no existe en contactos añado
// RF 1.1.2 Si nombre existe modifico contacto
// RF1.2 Si nombre y no telefono elimino
// RF 1.3 Si aprieto borrar contactos eliminar todos
// RF3 Salidas que genera el programa
// RF 3.1 Un listado de los contactos o no hay contactos
// RF 3.2 mostrar el error
// RF 3.3 Desahabilitara el boton borrar contactos si no hay
// RF 3.4 Informo el número de contactos
// RF 3.5 Mostrar los contactos ordenados por nombre
$agenda = $_POST['agenda'] ?? [];
$opcion = $_POST['submit'] ?? null;
$error = "";
$msj = "";
    //leer datos para validarlos

    if(isset($_POST['submit'])) {

        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
        $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
        $nombre =  trim($nombre);
            switch ($opcion) {
                case "Añadir contacto":
                    $error = validar_error($nombre,$telefono,$agenda);
                    [$agenda,$msj] = realiza_accion($nombre, $telefono, $agenda);
                    break;
                case "Eliminar contactos":
                    $agenda = [];
                    $msj = "La agenda se ha eliminado";
                    break;
                default:
            }

    }
//generar salidas

$tabla_agenda = dame_contenido_agenda($agenda);
$disabled = sizeof($agenda) == 0 ? "disabled" : "";
$contactos = sizeof($agenda);
$plural = (sizeof($agenda) != 1) ? "s" : "";
$inputs_hidden = dame_inputs_hidden($agenda);
function dame_inputs_hidden($agenda) : string{
    $inputs = "";
    foreach ($agenda as $key => $value) {
        $inputs .= "<input type='hidden' name='agenda[".$key."]' value='".$value."'>";
    }
    return $inputs;
}

function realiza_accion( string $nombre, string $telefono,array $agenda) : array {

    if ($telefono == "") {
        unset($agenda[$nombre]);
        $msj = "Se ha eliminado el contacto $nombre";
    } else {
        $accion = isset($agenda[$nombre]) ? "modificado" : "agregado";
        $agenda[$nombre] = $telefono;
        $msj = "Se ha $accion el contacto $nombre";

    }
    return  [$agenda,$msj];
}

function validar_error(string $nombre, string $telefono, array $agenda) : null|string {
    $error = "";
    if ($nombre == "") $error .= "El nombre no puede estar vacío.<br>";
    if ($telefono != "" && !is_numeric($telefono)) $error .= "El teléfono debe ser numérico.<br>";
    if ($telefono == "" && !isset($agenda[$nombre])) $error .= "No se puede eliminar un contacto que no existe.<br>";
    if (in_array($telefono, $agenda) && (!isset($agenda[$nombre]) || $agenda[$nombre] != $telefono))
        $error .= "El teléfono ya existe en otro contacto.<br>";
    return $error ?: null;
}
function dame_contenido_agenda( array $agenda) : ?string {
    if (empty($agenda)) return "<p>No hay contactos registrados.</p>";
    ksort($agenda);
    $msj = "<table style='border-collapse: collapse; border: 1px solid black'>
<tr>
    <th style='border: 1px solid black; padding: 5px;'>Nombre</th>
    <th style='border: 1px solid black; padding: 5px;'>Telefono</th>
   
</tr>";
        foreach ($agenda as $nombre => $telefono) {

            $msj .= "<tr>
    <td style='border: 1px solid black; padding: 5px;'>" . ucfirst($nombre) . "</td>
    <td style='border: 1px solid black; padding: 5px;'>$telefono</td>
    
</tr>";
        }
        $msj .= "</table>";
        return $msj;
      
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./estilo.css" type="text/css">
    <title> Agenda de contactos </title>
</head>
<header>
    Agenda de contactos: con <?= "$contactos" ?> contacto<?= "$plural" ?></header>
<body>

<div class="listado_contactos">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
    <div class="center">
        <?= "$tabla_agenda" ?>   </div>
</div>
<!-- Creamos el formulario para insertr los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action="agenda.php" method="post">
        <br>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
        <label for="telefono">Teléfono </label><input type="text" name="telefono" size="15"/><br/>
        <input type="submit" value="Añadir contacto" name="submit">
    <input type="submit" value="Eliminar contactos" name="submit" <?= "$disabled" ?>  >

        <!-- Metemos los contactos existentes  ocultos en el formulario-->
        <?= "$inputs_hidden" ?>
    </form>
</fieldset>
<div style="clear:both ">
    <?= "$error"  ?? null?>
    <?= "$msj"  ?? null?>
    <hr/>
</div>

</body>

</html>
