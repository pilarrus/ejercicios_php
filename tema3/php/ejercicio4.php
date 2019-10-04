<?php
    require("../../php/funciones.php"); 
    
    if(isset($_POST['submit'])) {
        /*style, base, buttons*/
        pintar_cabezera_html('Ejercicio 4');
        echo "<body>\n";
        pintar_button_return_exercises_html();
        
        $aristoteles = controla_entrada($_POST['aristoteles']);
        $cervantes = controla_entrada($_POST['cervantes']);
        echo "<p>$aristoteles</p>";
        echo "<p>$cervantes</p>";
        echo "</body>\n";
        echo "</html>\n";

    } else {
        pintar_formulario_control_entrada('Ejercicio 4');
    }
?>