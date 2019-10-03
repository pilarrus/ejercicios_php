<?php
    require("../../php/funciones.php");
    
    $users["pepe@gmail.com"] = array("123", "Pepe");
    $users["juan@gmail.com"] = array("123", "Juan");
    $users["alfonso@gmail.com"] = array("123", "Alfonso");

    if(isset($_POST['submit'])) {
        pintar_cabezera_html('Ejercicio 2');
        echo "<body>\n";
        pintar_button_return_exercises_html();
        control_de_acceso($users, $_POST['usuario'], $_POST['password']);
        echo "</body>";
        echo "</html>";
    } else {
        pintar_control_acceso_html('Ejercicio2');
    }
?>

