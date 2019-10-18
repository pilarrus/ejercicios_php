<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_1_buscar_posicion.php");
    $css = ["base", "buttons", "forms", "positions", "style"];

    if(isset($_POST['submit'])) {
        paint_response('Ejercicio 1 - Buscar posición', $css);
    } else {
        paint_form_buscar('Ejercicio 1 - Buscar posición', $css);
    }
?>