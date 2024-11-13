<?php
    namespace Objetos\ProyectoVideoclub;
    include_once("soporte.php");
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
            return (parent::muestraResumen() . "<p>Duración: " . $this->getDuracion() . "min</p>");
        }
    }
?>