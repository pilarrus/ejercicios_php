<?php
    //require("../../php/funciones_de_pintar");

    function paint_form_upload_files($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data" class="form_border form_padding">
            <p>Selecciona el archivo que quieres subir</p>    
            <div class="center">
                <input type="file" name="file" id="file">
            </div>
AAA;
            paint_button_submit();
            echo <<<AAA
            </form>
        </div>
        </body>
        </html>
AAA;
    }
?>