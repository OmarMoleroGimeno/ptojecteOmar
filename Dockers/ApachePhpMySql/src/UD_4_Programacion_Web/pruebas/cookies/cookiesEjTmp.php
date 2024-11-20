<?php
    if (isset($_GET['idioma'])){
        setcookie('idioma',$_GET['idioma'], time()+3600, "/");
        header("Location:cookiesEj.php");
    }
?>