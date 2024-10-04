<?php
    function peseta2euros(int $pesetas, float $cotizacion = 0.00601) : float
    {
        return ($pesetas * $cotizacion);
    }

    function euros2pesetas(int $euros, float $cotizacion = 166.386) : float
    {
        return ($euros * $cotizacion);
    }
?>