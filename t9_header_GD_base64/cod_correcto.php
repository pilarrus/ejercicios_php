<?php
    require("../php/funciones_de_pintar.php");
    $css = ["base", "buttons", "positions", "style"];

    pintar_cabecera_html("Redirigir", $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    echo <<<AAA
        <p>¡Has introducido el código correctamente! =) </p>
    </body>
    </html>
AAA;

?>