<?php
    require("../../funciones_de_pintar.php");
    require("../../funciones.php");
    //require("funciones.php");

    if(isset($_POST['submit'])) {;
        var_dump($_POST);
        
        setcookie('preferencias["idioma"]', $_POST['idioma']);
        setcookie('preferencias["fuente"]', $_POST['color_fuente']);
        setcookie('preferencias["fondo"]', $_POST['color_fondo']);

        header("Location: ./ver_formulario.php");
        
    } else {
        
    }
