<?php
    /**
     * Match se utiliza para crear una especie de switch pero la peculiaridad
     * es que va con rangos o incluso con palabras.
     */

    $comida = 'pastel';

    // Si $comida coincide con alguno de los tres lo asigna a $valor_devuelto.
    $valor_devuelto = match ($comida) {
        'manzana' => 'Esta comida es una manzana',
        'barra' => 'Esta comida es una barra',
        'pastel' => 'Esta comida es un pastel',
    };

    $age = 18;

    // Crea un rango, y dependiendo de la variable lo asigna a $output
    $output = match (true) {
        $age < 2 => 'Eres un bebé',
        $age < 10 => 'Eres un niño',
        $age < 18 => 'Eres un adolescente',
        $age >= 18 => 'Eres mayor de edad',
        $age < 40 => 'Eres un adulto joven',
        $age >= 40 => 'Eres un adulto viejo'
    };
?>