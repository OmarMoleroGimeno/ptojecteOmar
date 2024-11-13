<?php
    namespace Objetos\ProyectoVideoclub;
    include_once("soporte.php");
    class Juego extends Soporte
    {
        public function __construct(string $titulo, float $precio, public string $consola, private int $minNumJugadores, private int $maxNumJugadores)
        {
           parent::__construct($titulo, $precio); 
        }

        public function getMinNumJugadores()
        {
            return $this->minNumJugadores;
        }
        public function getMaxNumJugadores()
        {
            return $this->maxNumJugadores;
        }

        public function muestraResumen()
        {
            $cadena = (parent::muestraResumen() . "<p>Consola: "  . $this->consola . "</p>");
            if ($this->getMinNumJugadores() > 1 && $this->getMaxNumJugadores() > 1)
            {
                if ($this->getMinNumJugadores() != $this->getMaxNumJugadores()) 
                {
                    $cadena .= "<p>El juego es para" .  $this->getMaxNumJugadores() . "</p>";
                } else
                {
                    $cadena .= "<p>El juego es para" .  $this->getMinNumJugadores() . "-" . $this->getMaxNumJugadores() . "</p>";
                }
            } 
            else
            {
                $cadena .= "<p>El juego es para 1 jugador</p>";
            }
            return $cadena;
        }
    }
?>