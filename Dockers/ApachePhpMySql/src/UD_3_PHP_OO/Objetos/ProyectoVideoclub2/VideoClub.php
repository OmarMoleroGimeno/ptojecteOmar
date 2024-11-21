<?php
    namespace Objetos\ProyectoVideoclub2;
    use Objetos\ProyectoVideoclub2\CintaVideo;
    use Objetos\ProyectoVideoclub2\Dvd;
    use Objetos\ProyectoVideoclub2\Juego;
    use Objetos\ProyectoVideoclub2\Cliente;
    include_once "./cintaVideo.php";
    include_once "./dvd.php";
    include_once "./juego.php";
    include_once "./cliente.php";
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
            $this->idVideoclub = self::$numVideoclubs++; // ID del videoclub, autoincrement
        }

        private function incluirProducto(Soporte $s)
        {
            $this->productos[] = $s;
            return $this;
        }

        function incluirCintaVideo(string $titulo, float $precio, int $duracion)
        {
            $cintaVideo = new CintaVideo($titulo, $precio, $duracion);
            $this->productos[] = $cintaVideo;
            echo "  <div class='success'>
                        <p>La cinta de video se ha añadido correctamente</p>
                    </div>";
            return $this;
        }

        function incluirDvd(string $titulo, float $precio, string $idiomas, string $pantalla)
        {
            $dvd = new Dvd($titulo, $precio, $idiomas, $pantalla);
            $this->productos[] = $dvd;
            echo "  <div class='success'>
                        <p>El DVD se ha añadido correctamente</p>
                    </div>";
            return $this;
        }

        function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ)
        {
            $juego = new Juego($titulo, $precio, $consola, $minJ, $maxJ);
            $this->productos[] = $juego;
            echo "  <div class='success'>
                        <p>El Juego se ha añadido correctamente</p>
                    </div>";
            return $this;
        }

        function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3)
        {
            $cliente = new Cliente($nombre, $maxAlquileresConcurrentes);
            $this->socios[] = $cliente;
            echo "  <div class='success'>
                        <p>El Socio se ha añadido correctamente</p>
                    </div>";
            return $this;
        }

        function listarProductos()
        {
            $cadena = "<h2>Productos</h2>";
            foreach ($this->productos as $soporte)
            {
                $cadena .= $soporte->muestraResumen();
            }
            echo($cadena);
            return $this;
        }

        function listarSocios()
        {
            $cadena = "<h2>Socios</h2>";
            foreach ($this->socios as $socio)
            {
                $cadena .= $socio->muestraResumen();
            }
            echo($cadena);
            return $this;
        }

        function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte)
        {
            $cadena = '';
            $encontrado = false;
            for ($i=0; $i < count($this->socios) ; $i++) 
            {
                
                if ($this->socios[$i]->getNumeroID() == $numeroCliente && !$encontrado)
                {
                    
                    for ($i=0; $i < count($this->productos); $i++)
                    {
                        if($this->productos[$i]->getNumeroId() == $numeroSoporte && !$encontrado)
                        {
                            $this->socios[$i]->alquilar($this->productos[$i]);
                            $encontrado = true;
                            return $this;
                        }
                        else
                        {
                            $cadena = " <div class='error'>
                                            <p>El cliente que buscas no esta requistrado</p>
                                        </div>";
                        }
                    }

                }
                else
                {
                    $cadena = " <div class='error'>
                                        <p>El cliente que buscas no esta requistrado</p>
                            </div>";
                }

            }
            foreach ($this->socios as $socio)
            {
                if ($socio->getNumeroID() == $numeroCliente) {
                    
                    foreach($this->productos as $producto)
                    {
                        if($producto->getNumeroId() == $numeroSoporte)
                        {
                            $socio->alquilar($producto); 
                            return $this;
                        }
                        else
                        {
                            $cadena = " <div class='error'>
                                            <p>El cliente que buscas no esta requistrado</p>
                                        </div>";
                        }
                    }

                }
                else
                {
                    $cadena = " <div class='error'>
                                        <p>El cliente que buscas no esta requistrado</p>
                            </div>";
                }
                
            }
            echo $cadena;
                return $cadena;
            
            
        }


    }
    
?>