<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_4_visualizar_foto.php");
    $css = ["base", "style", "buttons", "forms", "positions"];

    if(isset($_POST['submit'])) {
        paint_image('Ejercicio 4', $css);

    } else {
        paint_form('Ejercicio 4', $css);
    }

?>
