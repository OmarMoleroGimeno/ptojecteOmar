<?php
    namespace UD_3_PHP_OO\Objetos\Ejercicio_308;
    class Persona
    {

        public function __construct(public string $nombre, public string $apellidos)
        {}

        public function getNombre()
        {	
            return $this->nombre;
        }

        public function getApellidos()
        {	
            return $this->apellidos;
        }

        public function getNombreCompleto()
        {	
            return $this->nombre . " " . $this->apellidos;
        }

    }
?>