<?php

    function pintar_base_html($ruta, $css, $funcion) {
        pintar_cabecera_html($ruta, $css);
        echo "<body>";
        pintar_button_volver_a_ejercicios($ruta);
        $funcion();
        echo <<<AAA
        </body>
        </html>
AAA;
    }

    function pintar_button_submit($name, $texto) {
        echo <<<AAA
        <button type="submit" name="$name" value="$name">$texto</button>
AAA;
    }

    function pintar_button_volver_a_ejercicios($ruta) {
        echo <<<AAA
        <button class="volver_a_ejercicios">
            <a href="$ruta/index.php">Volver a Ejercicios</a>
        </button>\n
AAA;
    }

    function pintar_cabecera_html($ruta, $css) {
        echo <<<AAA
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Pilar</title>\n
AAA;
                pintar_links_css($ruta, $css);
            echo "</head>\n";
    }

    function pintar_input($type, $name, $value="", $texto="", $id="") {
        echo <<<AAA
        <input type="$type" name="$name" value="$value" id="$id"/>$texto
AAA;
    }

    function pintar_label($texto, $id="") {
        echo <<<AAA
        <label for="$id">$texto</label>
AAA;
    }

    function pintar_links_css($ruta, $nombres) {
        foreach($nombres as $nombre) {
            echo <<<AAA
            <link rel="stylesheet" href="$ruta/css/$nombre.css">
AAA;
        }
    }
   
    function pintar_options($options) {
        foreach($options as $option) {
            echo <<<AAA
            <option value="$option">$option</option>
AAA;
        }
    }

    function pintar_select($name, $options) {
        echo <<<AAA
        <select name="$name">
AAA;
            pintar_options($options);
        echo <<<AAA
        </select>
AAA;
    }

?>

