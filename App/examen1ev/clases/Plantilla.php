<?php

namespace examen1ev\clases;

class Plantilla
{

    static public function genera_formulario_juego()
    {
        $html_select = "";
        $colores = Clave::COLORES;

        $color_defecto = $colores[0];

        for ($n = 0; $n < 4; $n++) {
            $html_select .= "<select name='combinacion[]' id='combinacion$n' onchange='cambia_color($n)' class='$color_defecto'>";

            foreach ($colores as $color) {
                $html_select .= "<option class='$color' value='$color'> $color </option> ";
            }
            $html_select .= "</select>";
        }
        return $html_select;
    }

}

?>