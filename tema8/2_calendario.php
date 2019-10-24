<?php
    require("../php/funciones_de_pintar.php");
    require("calendario_funciones.php");
    $css = ["base", "buttons", "forms", "tables", "positions", "style"];
    
    pintar_form("Ejercicio 2", $css);

    if(isset($_POST['submit'])) {
        print_r($_POST);
        if(is_numeric($_POST['anio'])){
            $anio = $_POST['anio'];
        } else {
            $anio = date("Y");
        }
        echo $anio;
        calendario_anual($anio);
    }

?>