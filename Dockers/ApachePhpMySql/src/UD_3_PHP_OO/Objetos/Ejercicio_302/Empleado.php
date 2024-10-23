<?php
    class Empleado
    {
        public function __construct(
            private string $nombre,
            private string $apellidos,
            private string $sueldo
        ){}

        public function __getNombre()
        {
            return $this->nombre;
        }

        public function __setNombre(string $nombre)
        {
            $this->nombre = $nombre;
            return $this;
        }

        public function __getApellidos()
        {
            return $this->apellidos;
        }

        public function __setpellidos(string $apellidos)
        {
            $this->apellidos = $apellidos;
            return $this;
        }

        public function __getSueldo()
        {
            return $this->sueldo;
        }

        public function __setSueldo(string $sueldo)
        {
            $this->sueldo = $sueldo;
            return $this;
        }

        public function __getNombreCompleto()
        {
            return $this->nombre . ' ' . $this->apellidos;
        }
        
        public function __debePagarImpuestos()
        {   
            $pagas = false;
            if ($this->sueldo >= 3333) {
                $pagas = true;
            }
            return $pagas;
        }

    }

    $empleado1 = new Empleado("Juan", "Pérez", 2500);
    echo $empleado1->__getNombreCompleto() . '</br></br>';

    $empleado2 = new Empleado("Ana", "López", 3000);
    $empleado2->__setSueldo(4000);
    echo $empleado2->__debePagarImpuestos() ? "Debe pagar impuestos</br></br>" : "No debe pagar impuestos</br></br>";
    
    $empleado3 = new Empleado("Carlos", "García", 3200);
    echo $empleado3->__debePagarImpuestos() ? "Debe pagar impuestos</br></br>" : "No debe pagar impuestos</br></br>";
?>