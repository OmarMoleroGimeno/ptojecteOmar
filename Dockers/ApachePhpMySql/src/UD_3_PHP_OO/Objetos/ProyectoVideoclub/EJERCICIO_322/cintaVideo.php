<?php
    namespace UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_322;
    use Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\Soporte;
    class CintaVideo extends Soporte
    {
        function __construct(string $titulo, float $precio, private int $duracion)
        {
            parent::__construct($titulo, $precio);
        }

        function getDuracion() 
        {
            return $this->duracion;    
        }

        function muestraResumen()
        {
            echo (parent::muestraResumen() . "<p>Duración: " . $this->getDuracion() . "min</p>");
        }
    }
?>