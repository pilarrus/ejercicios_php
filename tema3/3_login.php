<?php
    require("php/funciones_3_login.php");

    if(isset($_POST['submit'])) {
        $css = ["style", "base", "buttons"];
        registro('Ejercicio 3', $css);
    } else {
        $css = ["style", "base", "buttons", "forms", "positions"];
        pintar_formulario_registro('Ejercicio 3', $css);
    }
?>