<?php
    namespace UD_3_PHP_OO\Objetos\Ejercicio_313;
    abstract class Persona
    {

        public function __construct(public string $nombre, public string $apellidos, public int $edad)
        {}

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

?>