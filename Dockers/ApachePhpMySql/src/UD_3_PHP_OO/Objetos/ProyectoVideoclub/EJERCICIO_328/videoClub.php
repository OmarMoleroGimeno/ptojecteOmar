<?php
    namespace UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_328;
    use Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\Soporte;
    class Videoclub
    {
        private static int $numProductos = 0;
        private static int $numSocios = 0;
        private array $productos = [];
        private array $socios = [];
        private static int $numVideoclubs = 0; // Autoincrement
        private int $idVideoclub;
        

        function __construct(private string $nombre)
        {
            $this->idVideoclub = $this->numVideoclubs++; // ID del videoclub, autoincrement
        }

        private function incluirProducto(Soporte $s)
        {
            $this->productos[] = $s;
        }

        private function incluirCintaVideo(string $titulo, float $precio, int $duracion)
        {
            
        }


    }
    
?>