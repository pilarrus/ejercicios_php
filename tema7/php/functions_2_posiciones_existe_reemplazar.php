<?php

    function paint_response($exercise, $css, $funcion){
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
        $funcion
        </div>
        </body>
        </html>
AAA;
    }

    function paint_form($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" class="form_border">
AAA;
            paint_label_input_text('Introduce la frase', 'phrase');
            paint_label_input_text('Introduce la palabra', 'word');
            echo <<<AAA
            <div class="center">
                <button name="positions" class="submit">Posiciones</button>
            </div>
            <div class="center">
                <button name="exists" class="submit">Existe</button>
            </div>
            <div class="center">
                <button name="replace" class="submit">Reemplazar por</button>
                <input type="text" name="replacer">
            </div>
            </form>
        </div>
        </body>
        </html>
AAA;
    }

?>