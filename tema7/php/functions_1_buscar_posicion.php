<?php

    function paint_form_buscar($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" class="form_border">
AAA;
            paint_label_input_text('Introduce la frase', 'phrase');
            paint_label_input_text('Introduce la palabra', 'word');
            paint_button_submit();
            echo <<<AAA
            </form>
        </div>
        </body>
        </html>
AAA;
    }

    function paint_response($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
            <div class="center">
AAA;
            //echo paint_positions();
            $phrase = controla_entrada($_POST['phrase']);
            $word = controla_entrada($_POST['word']);
            if (!empty($phrase)) {
                if (!empty($word)) {
                    echo paint_positions($phrase, $word);
                } else {
                    echo "<p>Debes introducir una palabra</p>";
                }
            } else {
                echo "<p>Debes introducir una frase</p>";
            }
            echo <<<AAA
            </div>
        </body>
        </html>
AAA;
    }

?>