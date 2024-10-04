<?php

    if (!empty($_POST))
    {
        $email = $_POST['email'];
        $contrasenha = $_POST['contrasenha'];

        $usuario_correcto = false;
        $contraseña_correcta = false;

        $usuarios = [
            'omar@gmail.com' => 'dwes',
            'enric@gmail.com' => 'dwes'
        ];

        if (array_key_exists($email, $usuarios)) 
        {
            $usuario_correcto = true;
        
            if ($usuarios[$email] == $contrasenha)
            {
                $contraseña_correcta = true;
            }
        }
    }
?>