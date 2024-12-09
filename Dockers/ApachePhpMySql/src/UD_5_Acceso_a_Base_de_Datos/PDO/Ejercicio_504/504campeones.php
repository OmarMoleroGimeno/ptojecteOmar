<?php
   // dsn (Nombre del Origen de Datos, DSN)
   $dsn = 'mysql:dbname=lol; host=127.0.0.1';
   $usuario = 'root';
   $contrasenya = '';

   try 
   {
     $conexion = new PDO($dsn, $usuario, $contrasenya);
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "SELECT * FROM campeon";
     $sentencia = $conexion -> prepare($sql);
     $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
     $isOk = $sentencia -> execute();
     $campeones = $sentencia -> fetchAll();

     foreach($campeones as $campeon) {
          echo"Id:" . $campeon["id"] . "<br />";
          echo"Nombre:" . $campeon["nombre"] . "<br />";
          echo"Rol:" . $campeon["rol"] . "<br />";
          echo"Dificultad:" . $campeon["dificultad"] . "<br />";        
          echo"Descripción:" . $campeon["descripcion"] . "<br /> <br />";
     }

   } 
   catch (PDOException $e) 
   {
     echo 'Fallo en la conexión: ' . $e->getMessage();
   }
?>