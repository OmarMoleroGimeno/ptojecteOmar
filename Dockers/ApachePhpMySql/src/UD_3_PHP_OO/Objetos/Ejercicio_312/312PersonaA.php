<?php
    namespace UD_3_PHP_OO\Objetos\Ejercicio_312;
    abstract class Persona
    {

        public function __construct(public string $nombre, public string $apellidos, public int $edad)
        {}

        public function getNombre()
        {	
            return $this->nombre;
        }
        public function getEdad()
        {	
            return $this->edad;
        }

        public function getApellidos()
        {	
            return $this->apellidos;
        }

        public function getNombreCompleto()
        {	
            return $this->nombre . " " . $this->apellidos;
        }

        public function __toString()
        {
            return "Nombre : " . $this->getNombre() . ", Apellidos: " . $this->getApellidos() .
                   ", Edad: " . $this->getEdad();
        }

        abstract public static function toHtml(Persona $p);

    }
    class Empleado extends Persona
    {
        private array $telefonos = [];
        private float $sueldo;
        private static int  $sueldoTope = 3333;

        public function __construct(string $nombre, string $apellidos, int $edad, $sueldo = 1000)
        {
            parent::__construct($nombre, $apellidos, $edad);
            $this->sueldo = $sueldo;
        }

        public function sueldoTope($sueldoTope)
        {
            $this->sueldo = $sueldoTope;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function getSueldo()
        {
            return $this->sueldo;
        }

        public function setSueldo(float $sueldo)
        {
            $this->sueldo = $sueldo;
            return $this;
        }

        public function getNombreCompleto()
        {
            return $this->nombre . ' ' . $this->apellidos;
        }

        public function anyadirTelefono(int $telefono)
        {
            $this->telefonos[] = $telefono;
        }

        public function listarTelefonos()
        {
            if (empty($this->telefonos)) {
                echo "No hay teléfonos registrados.</br>";
                return;
            }

            $text = 'Teléfonos: ';
            foreach ($this->telefonos as $telefono) {
                $text .= $telefono . ', ';
            }
            echo $text . "</br>";
        }

        public function vaciarTelefonos()
        {
            $this->telefonos = [];
        }

        public function debePagarImpuestos()
        {   
            return $this->sueldo >= self::$sueldoTope &&  self::$edad >= 21;
        }

        public function __toString()
        {   
            return parent::__toString() . ", Sueldo: " . $this->getSueldo() . ".";
        }

        public static function toHtml(Persona $p) {
            if ($p instanceof Empleado) {
                $textHtml = parent::toHtml($p);
                $textHtml .= "<p>Sueldo: " . $p->getSueldo() . "<br>Telefonos:</p>";

                $textHtml .= "<ul>";
                for ($i=0; $i < count($p->telefonos); $i++) { 
                    $textHtml .= "<li>" . $p->telefonos[$i] . "</li>";
                }
                $textHtml .=  "</ul>";
                echo $textHtml;
            } else {
                 echo parent::toHtml($p);
            }
        }
    }


    $empleado1 = new Empleado("Juan", "Pérez", 40, 2);
    echo $empleado1->__toString();
?>