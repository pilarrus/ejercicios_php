<?php
    require("../../php/funciones.php");
    $users["pepe@gmail.com"] = array("123", "Pepe");
    $users["juan@gmail.com"] = array("123", "Juan");
    $users["alfonso@gmail.com"] = array("123", "Alfonso");

    if(isset($_POST['submit'])) {
        echo cabezera_html('Ejercicio 2');
        echo "<body>\n"; 
        echo button_return_exercises_html();
        echo control_de_acceso($users, $_POST['usuario'], $_POST['password']);
        echo "</body>";
        echo "</html>";
    } else {
        //header("Location: ../html/control_de_acceso.html");
        echo pintar_control_acceso_html('Ejercicio2','PHP_SELF');
    }
?>

