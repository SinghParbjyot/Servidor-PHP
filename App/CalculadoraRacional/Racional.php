<?php
/**
 * Clase Racional
 *
 * Esta clase permite la creación y manipulación de números racionales (fracciones).
 * Incluye operaciones aritméticas básicas (suma, resta, multiplicación, división)
 * y funcionalidades para simplificar la fracción resultante.
 *
 * @category Matemáticas
 * @package  Calculadora
 * @author  Parbjyot Singh
 * @license  MIT https://opensource.org/licenses/MIT
 * @version  1.0.0
 */
class Racional
{
    /**
     * @var int $num Numerador del número racional.
     */
    public int $num;

    /**
     * @var int $den Denominador del número racional.
     */
    public int $den;

    /**
     * Constructor de la clase Racional.
     *
     * Inicializa el objeto. Puede recibir el numerador como entero y el denominador por separado,
     * o una cadena de texto con formato "numerador/denominador".
     *
     * @param int|string $num Numerador del racional o una cadena con formato "a/b".
     * @param int        $den Denominador del racional (opcional, por defecto es 1).
     * Si $num es una cadena, este parámetro puede ser ignorado.
     */
    public function __construct(int|string $num, int $den = 1)
    {
        if (is_string($num)) {
            $valores = explode("/", $num);
            $num = $valores[0];
            $den = $valores[1] ?? 1; // Si no hay parte denominador en el string, usa 1
            $num = intval($num);
            $den = intval($den);
        }
        $this->num = $num;
        $this->den = $den;
    }

    /**
     * Convierte el objeto Racional a una cadena de texto.
     *
     * @return string Representación del racional en formato "numerador / denominador".
     */
    public function __toString(): string
    {
        return $this->num . " /" . $this->den;
    }

    /**
     * Suma dos números racionales.
     *
     * Realiza la suma algebraica del objeto actual con otro objeto Racional pasado por parámetro.
     * No simplifica el resultado automáticamente.
     *
     * @param Racional $op2 El segundo operando racional a sumar.
     *
     * @return Racional Devuelve un nuevo objeto Racional con el resultado de la suma.
     */
    public function sumar(Racional $op2): Racional
    {
        $den = $op2->den * $this->den;
        $num = $op2->num * $this->den + $op2->den * $this->num;
        return new Racional($num, $den);
    }

    /**
     * Resta dos números racionales.
     *
     * @param Racional $op2 El sustraendo (racional a restar).
     *
     * @return Racional Devuelve un nuevo objeto Racional con el resultado de la resta.
     */
    public function resta(Racional $op2): Racional
    {
        $den = $op2->den * $this->den;
        $num = $op2->num * $this->den - $op2->den * $this->num;
        return new Racional($num, $den);
    }

    /**
     * Multiplica dos números racionales.
     *
     * @param Racional $op2 El multiplicador racional.
     *
     * @return Racional Devuelve un nuevo objeto Racional con el producto.
     */
    public function multiplicar(Racional $op2): Racional
    {
        $den = $op2->den * $this->den;
        $num = $op2->num * $this->num;
        return new Racional($num, $den);
    }

    /**
     * Divide dos números racionales.
     *
     * Realiza la división invirtiendo el segundo operador y multiplicando.
     * Verifica si el resultado implicaría una división por cero.
     *
     * @param Racional $op2 El divisor racional.
     *
     * @return Racional|string Devuelve un objeto Racional con el resultado,
     * o un string de error si se intenta dividir por cero.
     */
    public function dividir(Racional $op2): Racional|string
    {
        // En la división de fracciones: (a/b) / (c/d) = (a*d) / (b*c)
        // El numerador resultante es $this->num * $op2->den
        // El denominador resultante es $this->den * $op2->num

        $den = $this->den * $op2->num;
        $num = $this->num * $op2->den;

        if ($den == 0) {
            return "No se puede dividir entre 0";
        }
        return new Racional($num, $den);
    }

    /**
     * Calcula el Máximo Común Divisor (MCD).
     *
     * Método auxiliar privado utilizado para la simplificación de fracciones.
     * Utiliza el algoritmo de Euclides.
     *
     * @return int El máximo común divisor de los atributos num y den.
     */
    private function mcd(): int
    {
        $a = $this->num;
        $b = $this->den;
        while ($b != 0) {
            $resto = $a % $b;
            $a = $b;
            $b = $resto;
        }
        return $a;
    }

    /**
     * Simplifica el número racional actual.
     *
     * Utiliza el MCD para reducir el numerador y el denominador a su mínima expresión.
     *
     * @return Racional Devuelve una nueva instancia de Racional simplificada.
     */
    public function simplificar(): Racional
    {
        $mcd = $this->mcd();
        $num = $this->num / $mcd;
        $den = $this->den / $mcd;
        return new Racional($num, $den);
    }
}
?>