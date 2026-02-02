<?php

namespace examen1ev\clases;

class Jugada
{
    private $colores;
    public $posiciones_acertadas;
    public $colores_acertadas;


    public function __construct(array $jugada)
    {
        $this->posiciones_acertadas = 0;
        $this->colores_acertadas = 0;
        $this->colores = $jugada;
        $clave = Clave::obtener_clave();
        $this->evalua_jugada($clave);
    }

    /**
     * @return int
     */

    public function get_posiciones_acertadas()
    {
        return $this->posiciones_acertadas;
    }

    /**
     * @param array $clave
     * @return void
     */
    private function evalua_jugada(array $clave)
    {
        $jugada_unica = array_unique($this->colores);
        foreach ($jugada_unica as $color) {
            if (in_array($color, $clave))
                $this->colores_acertadas++;
        }
        foreach ($this->colores as $pos => $color)
            if ($color == $clave[$pos])
                $this->posiciones_acertadas++;

    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $html_jugada = "";

        for ($n = 0; $n < $this->posiciones_acertadas; $n++)
            $html_jugada .= "<span class='negro'>$n</span>";

        for ($n = $this->posiciones_acertadas; $n < $this->colores_acertadas; $n++)
            $html_jugada .= "<span class='blanco'>$n</span>";

        $html_jugada .= "<span class='separador'></span>";

        foreach ($this->colores as $color) {
            $inicial = $color[0];
            $html_jugada .= "<span class='$color'>$inicial</span>";
        }
        return $html_jugada;
    }

    /**
     * @return string
     */
    public static function obtener_historico_jugadas()
    {
        $html = "";
        if (isset($_SESSION['jugadas']) && !empty($_SESSION['jugadas'])) {
            $jugadas = $_SESSION['jugadas'];
            $numero_jugada_actual = count($jugadas);
            $ultima_jugada_serializada = end($jugadas);
            $ultima_jugada = unserialize($ultima_jugada_serializada);

            $html .= "<h3>Jugada actual $numero_jugada_actual</h3>";
            $html .= "<h3>Resultado : " . $ultima_jugada->colores_acertadas . " Colores y " . $ultima_jugada->posiciones_acertadas . " posiciones</h3>";
            $html .= "<hr />";

            $html .= "<h3 style='color: black;'>Histórico de jugadas</h3>";

            $jugadas_invertidas = array_reverse($jugadas, true);

            foreach ($jugadas_invertidas as $pos => $jugada_ser) {
                $jugada_obj = unserialize($jugada_ser);
                $num = $pos + 1;

                $html .= "<h3>Valor de la jugada $num</h3>";
                $html .= "<div style='margin-bottom: 15px; overflow: hidden;'>";
                $html .= $jugada_obj;
                $html .= "</div>";
            }
        }
        return $html;
    }

    /**
     * @return string
     */
    public function dibujar_fila_final()
    {
        $html = "";
        foreach ($this->colores as $color) {
            $inicial = $color[0];
            $html .= "<div class='Color $color'>$inicial</div>";
        }
        return $html;
    }

}

?>