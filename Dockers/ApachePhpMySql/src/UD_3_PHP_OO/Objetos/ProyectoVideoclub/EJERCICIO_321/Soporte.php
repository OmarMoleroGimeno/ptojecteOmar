<?php
    namespace Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub;
    class Soporte
    {
        private const IVA = 0.21;
        protected static int $numero = 0;
        private int $numeroId;
        function __construct(public string $titulo, private float $precio)
        {
            $this->numeroId = self::$numero++;
        }

        function getPrecio()
        {
            return $this->precio;
        }

        function getNumeroId()
        {
            return $this->numeroId;
        }

        function getPrecioConIva()
        {
            return $precioconIva = $this->getPrecio()*self::IVA + $this->getPrecio();
        }

        function muestraResumen()
        {
            echo ("<h2>" . $this->titulo . "</h2>" .
                        "<p>Numero: " . $this->getNumeroId() . "</p>" .
                        "<p>Precio: " . $this->getPrecio() . "</p>" .
                        "<p>Precio con IVA: " . $this->getPrecioConIVA() . " €</p>");
        }
    }
?>