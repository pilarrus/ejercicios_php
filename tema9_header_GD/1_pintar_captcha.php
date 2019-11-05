<?php
    require("../php/funciones_de_pintar.php");
    require("../php/funciones.php");
    require("./1_funcion_buffer_captcha.php");
    $css = ["base", "buttons", "forms", "positions", "style"];
    
    /*pintar_cabecera_html('Ejercicio 1', $css);
    echo "<body>";
    pintar_button_return_exercises_html();*/
    //$imagen = "1_captcha.php";
    $imagen = buffer_captcha();
    if(isset($_POST['submit'])) {
        if(isset($_POST['captcha'])) {
            //$text_captcha = ;
            $text_input = controla_entrada($_POST['captcha']);
        }
        echo $text_input;
    } else {
        pintar_cabecera_html('Ejercicio 1', $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <img src="$imagen" alt="captcha">
        </div>
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" class="form_border">
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
    }

?>