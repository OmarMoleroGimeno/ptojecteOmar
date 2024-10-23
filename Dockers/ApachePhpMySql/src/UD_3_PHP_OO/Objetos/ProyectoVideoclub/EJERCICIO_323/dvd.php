<?php
    namespace UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_323;
    use Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\Soporte;

    class Dvd extends Soporte
    {
        public function __construct(string $titulo, float $precio, public string $idiomas, private string $formatPantalla)
        {
            parent::__construct($titulo, $precio);
        }

        public function getIdiomas()
        {
            return $this->idiomas;
        }

        public function getFormatPantalla()
        {
            return $this->formatPantalla;
        }

        #[\Override]
        function muestraResumen()
        {   
            return (parent::muestraResumen() . "<p>Formato: " . $this->getFormatPantalla() . "</p>" .
                  "<p>Idiomas: " . $this->getIdiomas() . "</p>");
        }
    }
    
?>