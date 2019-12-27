<?php
    require("../php/funciones_de_pintar.php");
    require("funciones_captcha.php");
    $css = ["base", "buttons", "positions", "style"];

    pintar_cabecera_html("Imagen en base64", $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    $imagen = "crea_imagen.php";
    echo <<<AAA
        <div class="center">
            <img src="$imagen" alt="">
        </div>
    </body>
    </html>
AAA;
?>