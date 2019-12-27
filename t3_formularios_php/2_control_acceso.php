<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/funciones_2_control_acceso.php");
    
    $users["pepe@gmail.com"] = array("123", "Pepe");
    $users["juan@gmail.com"] = array("123", "Juan");
    $users["alfonso@gmail.com"] = array("123", "Alfonso");

    if(isset($_POST['submit'])) {
        $css = ["style", "base", "buttons"];
        pintar_cabecera_html('Control de acceso', $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();

        control_de_acceso($users, $_POST['usuario'], $_POST['password']);

        echo "</body>\n";
        echo "</html>\n";
    } else {
        $css = ["style", "base", "buttons", "forms", "positions"];
        pintar_control_acceso_html('Control de acceso', $css);
    }
?>

