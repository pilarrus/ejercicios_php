<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_upload_files.php");

    $css = ["base", "style", "buttons", "forms", "positions"];

    if (isset($_POST['submit'])) {
        $relativeDirectory = "/../files";
        pintar_cabecera_html('Ejercicio 1', $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
        /*print_r($_FILES);
        echo "<br>";
        $type = $_FILES['file']['type'];
        echo $type;
        echo "<br>";*/
        if (upload_file_gif_jpeg()) {
            upload_file($relativeDirectory);
        } else {
            echo "El fichero no se puede mover porque no tiene extensión .gif, ni .jpeg";
        }
        echo "</body>\n";
        echo "</html>\n";
    } else {
        paint_form_upload_files('Ejercicio 1', $css);
    }
?>