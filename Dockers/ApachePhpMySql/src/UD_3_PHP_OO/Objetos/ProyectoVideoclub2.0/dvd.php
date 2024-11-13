<?php
    namespace Objetos\ProyectoVideoclub;
    include_once("soporte.php");

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

        function muestraResumen()
        {   
            return (parent::muestraResumen() . "<p>Formato: " . $this->getFormatPantalla() . "</p>" .
                  "<p>Idiomas: " . $this->getIdiomas() . "</p>");
        }
    }
    
?>