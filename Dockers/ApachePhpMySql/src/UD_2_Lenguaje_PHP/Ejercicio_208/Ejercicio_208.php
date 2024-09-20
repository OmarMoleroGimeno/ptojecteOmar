<?php 
    if (!empty($_POST["dinero"])){

        $dinero = $_POST["dinero"];
        
        $billete500 = 0;
        $billete200 = 0;
        $billete100 = 0;
        $billete50 = 0;
        $billete20 = 0;
        $billete10 = 0;
        $billete5 = 0;
        $billete2 = 0;
        $billete1 = 0;

        if ($dinero >= 500) {
            $billete500 = intdiv($dinero, 500);
            $dinero = $dinero%500;
        }

        if ($dinero >= 200) {
            $billete200 = intdiv($dinero, 200);
            $dinero = $dinero%200;
        }

        if ($dinero >= 100) {
            $billete100 = intdiv($dinero, 100);
            $dinero = $dinero%100;
        }

        if ($dinero >= 50) {
            $billete50 = intdiv($dinero, 50);
            $dinero = $dinero%50;
        }

        if ($dinero >= 20) {
            $billete20 = intdiv($dinero, 20);
            $dinero = $dinero%20;
        }

        if ($dinero >= 10) {
            $billete10 = intdiv($dinero, 10);
            $dinero = $dinero%10;
        }

        if ($dinero >= 5) {
            $billete5 = intdiv($dinero, 5);
            $dinero = $dinero%5;
        }

        if ($dinero >= 2) {
            $billete2 = intdiv($dinero, 2);
            $dinero = $dinero%2;
        }

        if ($dinero >= 1) {
            $billete2 = intdiv($dinero, 1);
            $dinero = $dinero%2;
        }

        echo("$billete500 billete de 500<br/>");
        echo("$billete200 billete de 200<br/>");
        echo("$billete100 billete de 100<br/>");
        echo("$billete50 billete de 50<br/>");
        echo("$billete20 billete de 20<br/>");
        echo("$billete10 billete de 10<br/>");
        echo("$billete5 billete de 5<br/>");
        echo("$billete2 billete de 2<br/>");
        echo("$billete1 billete de 1<br/>");
    }
?>