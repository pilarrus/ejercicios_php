<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_upload_files.php");

    $css = ["base", "style", "buttons", "forms", "positions"];

    if (isset($_POST['submit'])) {
        //print_r($_FILES);
        $relativeDirectory = "/../files";
        pintar_cabecera_html('Ejercicio 1', $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
        upload_file($relativeDirectory);
        echo "</body>\n";
        echo "</html>\n";
    } else {
        paint_form_upload_files('Ejercicio 1', $css);
    }
?>