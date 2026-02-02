<?php



namespace Plantilla;
Class Plantilla
{
    /**
     * @param $filas con el contenido de la tabla a array vacio si no hay datos
     * @param $tabla el nombre de la tabla
     * @param $campos los nombres de los atributos  de la tabla
     * @return string un texto diciendo que no hay datos a una tabla html con el contenido de las tablas
     */
    public static function getTableHtml(array $filas, string $tabla, array $campos): string
    {
        $html = "";
        // SI no hay datos retorno un string informativo
        if (count($filas) == 0) {
            return "<h1> La tabla no tiene datos</h1>";
        }
        $html .= "<table border='1'>";

        $html .= self::getTituloTabla($tabla, count($campos));
        $html .= self::getCabeceraCampos($campos);
        $html .= self::getContentFilas($filas);
        $html .= "</table>";
        return $html;
    }

    private static function getTituloTabla(string $tabla, int $span): string
    {
        return "<caption colspan='$span'>" . $tabla . "</caption>";
    }

    private static function getCabeceraCampos(array $campos): string
    {
        $cabecera = "";
        $cabecera .= "<tr>";
        foreach ($campos as $c) {
            $cabecera .= "<th>" . $c . "</th>";
        }
        $cabecera .= "</tr>";
        return $cabecera;
    }

    private static function getContentFilas(array $filas): string
    {
        $html = "";
        foreach ($filas as $fila) {
            $html .= "<tr>";
            foreach ($fila as $campo) {

                $html .= "<td>" . $campo . "</td>";

            }
            $html .= "</tr>";
        }
        return $html;
    }

    public static function getHeader(string $usuario, string $page): string
    {
        $header_html = "";
        $header_html .= "<div class='flex flex-row justify-end px-5 items-right h-12 gap-4 bg-gray-100'>";
        $header_html .= "<span class='font-semibold text-blue-900'>$usuario</span>";
        $header_html .= "<form method='post' action='$page' class='flex items-right px-5'>";
        $header_html .= "<input type='hidden' name='usuario' value='$usuario'>";
        $header_html .= "<button type='submit' name='submit' value='LogOut' class='bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-2 px-4 rounded transition'>";
        $header_html .= "Cerrar Sesión";
        $header_html .= "</button>";

        $header_html .= "</form>";
        $header_html .= "</div>";

        return $header_html;
    }
}
?>