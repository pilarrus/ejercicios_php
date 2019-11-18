<?php
    require("../php/funciones_de_pintar.php");
    require("funcion_crear_tabla.php");
    $css = ["base", "style", "buttons", "tables", "positions"];

    pintar_cabecera_html("Ejercicio 1", $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    //crear_tabla(4, 3,"width: 600px");
    crear_tabla(4, 3);
    echo "</body>";
    echo "</html>";

?>