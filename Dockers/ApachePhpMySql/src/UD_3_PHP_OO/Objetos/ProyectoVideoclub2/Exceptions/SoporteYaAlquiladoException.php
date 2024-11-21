<?php
    namespace Dwes\ProyectoVideoclub\Util;

    class SoporteYaAlquiladoException extends VideoclubException
    {
        public function __construct($message = "El soporte ya ha sido alquilado") {
            parent::__construct($message);
        }
    }    
?>