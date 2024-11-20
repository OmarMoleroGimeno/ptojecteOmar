<?php
    if (!$_COOKIE['idioma']){
        header('Location:cookiesEj.html');
    } else if ($_COOKIE['idioma']=="va"){
        header('Location:cookiesEjVa.php');
    } else if ($_COOKIE['idioma']=="va"){
        header('Location:cookiesEjEs.php');
    } else if ($_COOKIE['idioma']=="va"){
        header('Location:cookiesEjEn.php');
    }
?>