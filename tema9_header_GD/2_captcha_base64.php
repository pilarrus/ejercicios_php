<?php
    require("../php/funciones_de_pintar.php");
    require("funciones_captcha.php");
    $css = ["base", "buttons", "positions", "style"];

    pintar_cabecera_html("Imagen en base64", $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    $texto = random_string(5);
    $fondo = "fondos/fondo.jpeg";
    $fuente_letra = realpath("fuentes/OpenSans-Regular.ttf");
    $img = buffer_captcha($texto, $fondo, $fuente_letra);
    convertir_a_base_64($img);
    echo <<<AAA
    </body>
    </html>
AAA;
?>