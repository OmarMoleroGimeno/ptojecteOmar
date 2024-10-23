<?php
namespace Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_325;
use Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\Soporte;
    class Cliente 
    {
        protected static int $numero = 0;
        private static int $numSoportesAlquilados;
        private int $numeroId;
        private array $soportesAlquilados;
        
        public $maxAlquilerConcurrente;
        private string $nombre;
        public function __construct(string $nombre, int $maxAlquilerConcurrente = 3)
        {
            $this->numeroId = self::$numero++;
            $this->$maxAlquilerConcurrente = $maxAlquilerConcurrente;
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

        public function tieneAlquilado(Soporte $s)
        {
            $encontrado = false;
            for ($i=0; $i < count($this->soportesAlquilados); $i++) 
            { 
              if ($this->soportesAlquilados[$i].getNumeroId($s) == 'Soporte') {
                $encontrado = true;
              }  
            }
            return $encontrado;
        }

        public function alquilar(Soporte $s)
        {
            $cadena = '';
            if ($this->getNumSoportesAlquilados() == $this->maxAlquilerConcurrente) 
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
                $soportesAlquilados[] = $s;
                self::$numSoportesAlquilados++;
                $cadena = " <div class='found'>
                                <p>El soporte se ha añadido correctamente</p>
                            </div>";
            }

            echo $cadena;
        }

        public function muestraResumen ()
        {
            $cadena = "<h2>$this->nombre</h2>";
            if (count($this->soportesAlquilados) > 0) 
            {
                for ($i=0; $i < count($this->soportesAlquilados); $i++) 
                { 
                    $cadena .= "<p>" . $this->soportesAlquilados[$i] . "</p>";
                }
            }
            return $cadena;
            

        }
    }
    
?>