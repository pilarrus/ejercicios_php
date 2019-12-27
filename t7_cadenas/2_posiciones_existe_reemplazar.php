<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_2_posiciones_existe_reemplazar.php");
    require("php/functions_string.php");
    $css = ["base", "buttons", "forms", "positions", "style"];

    if (isset($_POST['positions'])) {
        paint_response('Ejercicio 2', $css, paint_positions(controla_entrada($_POST['phrase']), controla_entrada($_POST['word'])));

    } elseif (isset($_POST['exists'])) {
        $funcion = paint_exists();
        paint_response('Ejercicio 2', $css, $funcion);

    } elseif (isset($_POST['replace'])) {
        $funcion = paint_replace();
        paint_response('Ejercicio 2', $css, $funcion);
    } else {
        paint_form('Ejercicio 2', $css);
    }
?>