<?php
    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];

    if(isset($_POST['submit'])) {
        pintar_resultado_registro();
    } else {
        pintar_form_registro($ruta, $css);
        
    }

?>