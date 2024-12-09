<?php
    namespace Objetos\ProyectoVideoclub2;
    include_once("soporte.php");
    class Cliente 
    {
        protected static int $numero = 0;
        private int $numSoportesAlquilados = 0;
        private int $numeroId;
        private array $soportesAlquilados = [];
        private string $nombre;
        private int $maxAlquilerConcurrente;
        public function __construct(string $nombre, int $maxNum = 3)
        {
            $this->nombre = $nombre;
            $this->numeroId = self::$numero++;
            $this->maxAlquilerConcurrente = $maxNum;
        }

        public function getNumeroID()
        {
            return $this->numeroId;
        }

        public function setNumeroID(int $numero)
        {
            $this->numeroId = $numero;
        }

        public function getNumSoportesAlquilados()
        {
            return $this->numSoportesAlquilados;
        }

        public function getMaxAlquilerConcurrente()
        {
            return $this->maxAlquilerConcurrente;
        }

        public function getSoportesAlquilados()
        {
            return $this->soportesAlquilados;
        }

        public function tieneAlquilado(Soporte $s)
        {
            
            $encontrado = false;
            foreach ($this->getSoportesAlquilados() as $soporte)
            {
                if ($soporte->getNumeroID() === $s->getNumeroID()) 
                {
                    $encontrado = true;
                } 
            }
            return $encontrado;
        }

        public function alquilar(Soporte $s)
        {
            $cadena = '';
            if ($this->getNumSoportesAlquilados() == $this->getMaxAlquilerConcurrente()) 
            {
                $cadena = " <div class='error'>
                                <p>Has pasado el límite de Soportes alquilados</p>
                            </div>";
            }
            else if($this->tieneAlquilado($s))
            {
                $cadena = " <div class='error'>
                                <p>El soporte ya lo tenia alquilado</p>
                            </div>";
            }
            else
            {
                $this->soportesAlquilados[] = $s;
                $this->numSoportesAlquilados++;
                $cadena = " <div class='success'>
                                <p>El soporte se ha añadido correctamente</p>
                            </div>";
            }

            echo $cadena;
            return $this;
        }

        function devolver(int $numSoporte)
        {
            echo($this->getSoportesAlquilados()[$numSoporte]->muestraResumen());
            return $this;
        }

        function listarAlquileres()
        {
            $cadena = "<h2>Tienes " . count($this->soportesAlquilados) .  " productos alquilados</h2>";
            for ($i=0; $i < count($this->soportesAlquilados); $i++) 
            { 
                $cadena .= "<p>" . $this->soportesAlquilados[$i]->muestraResumen() . "</p>";
            }
            echo $cadena;
        }



        public function muestraResumen()
        {
            $cadena = "<h2>$this->nombre</h2>";
            $cadena .= "<p>ID: " . $this->getNumeroID() . "</p>";
            if (count($this->soportesAlquilados) > 0)
            {
                for ($i=0; $i < count($this->soportesAlquilados); $i++) 
                { 
                    $cadena .= "<p>" . $this->soportesAlquilados[$i]->muestraResumen() . "</p>";
                }
            }
            echo $cadena;

        }
    }
    
?>