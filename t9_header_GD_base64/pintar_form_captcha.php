<?php
    require("../php/funciones_de_pintar.php");
    require("funciones_captcha.php");
    $css = ["base", "buttons", "forms", "positions", "style"];

    $fondo = "fondos/fondo.jpeg";
    $fuente_letra = realpath("fuentes/OpenSans-Regular.ttf");
    $text_captcha = random_string(5);
    $imagen = buffer_captcha($text_captcha, $fondo, $fuente_letra);

    pintar_cabecera_html("Redirigir", $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    convertir_a_base_64($imagen);
    echo <<<AAA
    <div class="center">
        <form action="index.php?valor=$text_captcha" method="post" class="form_border">
AAA;
            paint_label_input_text("Introduce las letras que ves en la imagen", "captcha");
            echo <<<AAA
            <div class="center">
                <button class="submit" name="submit">Enviar</button>
            </div>
        </form>
    </div>
    </body>
    </html>
AAA;

?>