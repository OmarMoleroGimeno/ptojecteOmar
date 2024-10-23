<?php
    namespace UD_3_PHP_OO\Objetos\Ejercicio_314;
    
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

        abstract public function toHtml(Persona $p);

    }
    abstract class Trabajador extends Persona
    {
        private array $telefonos = [];

        public function __construct(string $nombre, string $apellidos, int $edad)
        {
            parent::__construct($nombre, $apellidos, $edad);
        }

        public abstract function calcularSueldo();

        public abstract function debePagarImpuestos();

        public function toHtml(Persona $p)
        {
            $textHtml = '';
            if ($p instanceof Trabajador) {

                $textHtml .= "<ul>";
                $textHtml .= "<li>" . $p->nombre . "</li>";
                $textHtml .= "<li>" . $p->apellidos . "</li>";
                $textHtml .= "<li>" . $p->edad . "</li>";
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

    class Empleado extends Trabajador
    {
        private int $horasTrabajadas;
        private int $precioPorHora;

        private static float  $sueldoTope;

        public function __construct(string $nombre, string $apellidos, int $edad, int $precioPorHora, float $horasTrabajadas)
        {
            parent::__construct($nombre, $apellidos, $edad);
            $this->precioPorHora = $precioPorHora;
            $this->horasTrabajadas = $horasTrabajadas;
        }

        public function calcularSueldo()
        {
            return $this->horasTrabajadas * $this->precioPorHora;
        }

        public function debePagarImpuestos()
        {
            return self::calcularSueldo() >= self::$sueldoTope &&  self::$edad >= 21;
        }
        
    }

    class Gerente extends Trabajador
    {
        private float $salario;
        private float $precioPorHora;
        private float $horasTrabajadas;
        private static float  $sueldoTope;
        
        public function __construct(string $nombre, string $apellidos, int $edad, int $salario)
        {
            $this->salario = $salario;
            parent::__construct($nombre, $apellidos, $edad);
        }

        public function calcularSueldo()
        {
            $this-> salario = $this->horasTrabajadas * $this->precioPorHora;
        }

        public function debePagarImpuestos()
        {
            return self::calcularSueldo() >= self::$sueldoTope &&  self::$edad >= 21;
        }
        
    }
    class Empresa
    {
        public function __construct(private string $nombre, private string $direccion, private $trabajadores = [])
        {}

        public function anyadirTrabajador(Trabajador $t)
        {
            $this->trabajadores[] = $t;
        }

        public function listarTrabajadoresHtml()
        {
            for ($i=0; $i < count($this->trabajadores); $i++) { 
                echo $this->trabajadores[$i]->toHtml($this->trabajadores[$i]);
            }
        }

        public function getCosteNominas()
        {
            for ($i=0; $i < count($this->trabajadores); $i++) { 
                $this->trabajadores[$i]->calcularSueldo();
            }
        }

    }
?>