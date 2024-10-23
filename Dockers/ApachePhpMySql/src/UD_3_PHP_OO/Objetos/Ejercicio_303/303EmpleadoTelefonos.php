<?php
class Empleado
{
    private array $telefonos = [];

    public function __construct(
        private string $nombre,
        private string $apellidos,
        private float $sueldo
    ){}

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
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
        return $this->sueldo >= 3333;
    }
}


    $empleado1 = new Empleado("Juan", "Pérez", 3000);
    $empleado1->anyadirTelefono(123456789);
    $empleado1->anyadirTelefono(987654321);
    echo "Caso de prueba 1: " . $empleado1->getNombreCompleto() . "</br>";
    $empleado1->listarTelefonos();

    $empleado1->vaciarTelefonos();
    echo "Caso de prueba 2: Después de vaciar teléfonos, </br>";
    $empleado1->listarTelefonos();

    $empleado2 = new Empleado("Ana", "López", 3500);
    echo "Caso de prueba 3: " . $empleado2->getNombreCompleto() . " " . ($empleado2->debePagarImpuestos() ? "debe pagar impuestos" : "no debe pagar impuestos") . "</br>";
?>
