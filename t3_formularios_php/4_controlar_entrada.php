<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/funciones_4_controlar_entrada.php");
    
    if(isset($_POST['submit'])) {
        $css = ["style", "base", "buttons"];
        pintar_cabecera_html('Controlar entrada', $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
        
        $aristoteles = controla_entrada($_POST['aristoteles']);
        $cervantes = controla_entrada($_POST['cervantes']);
        echo <<<AAA
        <p>$aristoteles</p>\n
        <p>$cervantes</p>\n
        </body>\n
        </html>\n
AAA;

    } else {
        $css = ["style", "base", "buttons", "forms", "positions"];
        pintar_formulario_control_entrada('Controlar entrada', $css);
    }
?>