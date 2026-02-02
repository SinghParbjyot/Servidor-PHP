<?php

namespace examen1ev\clases;
class Clave
{
    public const COLORES = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marron', 'Rosa'];
    private static $clave = [];

    /**
     * @return array|mixed
     */
    public static function obtener_clave()
    {
        if (isset($_SESSION['clave']))
            self::$clave = $_SESSION['clave'];
        else {
            self::genera_clave();
            $_SESSION['clave'] = self::$clave;
        }
        return self::$clave;
    }

    /**
     * @return void
     */
    private static function genera_clave()
    {
        self::$clave = [];
        $colores = self::COLORES;
        $posiciones = array_rand($colores, 4);
        foreach ($posiciones as $posicion)
            self::$clave[] = $colores[$posicion];
    }

    /**
     * @return string
     */
    public static function get_clave()
    {
        $html = "<h1 style='text-align: left; padding-left: 10px; margin-bottom: 10px;'>Clave Actual</h1>";

        $html .= "<div class='fila_resultados' style='justify-content: flex-start; padding-left: 5px;'>";

        foreach (self::$clave as $color) {
            $html .= "<div class='Color $color'>$color</div>";
        }

        $html .= "</div>";
        return $html;
    }

    /**
     * @return string
     */
    public static function obtener_clave_final_html()
    {
        $html = "";
        foreach (self::$clave as $color) {
            $html .= "<div class='Color $color'>$color</div>";
        }
        return $html;
    }

}

?>