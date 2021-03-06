<?php

    /*function pintar_base_html($ruta, $css, $funcion) {
        pintar_cabecera_html($ruta, $css);
        echo "<body>";
        pintar_button_volver_a_ejercicios($ruta);
        $funcion('info_personal');
        echo <<<AAA
        </body>
        </html>
AAA;
    }*/

    function pintar_button_submit($name, $texto, $class='submit') {
        echo <<<AAA
        <button type="submit" name="$name" value="$name" class="$class">$texto</button>
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

    function pintar_input($type, $name, $value="", $texto="", $class="", $checked=false) {
        if(!$checked) {
            echo <<<AAA
            <input type="$type" name="$name" value="$value" class="$class" />$texto
AAA;
        } else {
            echo <<<AAA
            <input type="$type" name="$name" value="$value" class="$class" checked />$texto
AAA;
        }
    }

    function pintar_label($texto) {
        echo <<<AAA
        <label>$texto</label>
AAA;
    }

    function pintar_links_css($ruta, $nombres) {
        foreach($nombres as $nombre) {
            echo <<<AAA
            <link rel="stylesheet" href="$ruta/css/$nombre.css">
AAA;
        }
    }
   
    function pintar_options($options, $checked=false) {
        foreach($options as $label => $option) {
            echo <<<AAA
            <option value="$option">$label</option>
AAA;
        }
    }

    function pintar_select($name, $options, $multiple=false, $checked=false) {
        if(!$multiple) {
            echo <<<AAA
            <select name="$name">
AAA;
                pintar_options($options);
            echo <<<AAA
            </select>
AAA;
        } else {
            echo <<<AAA
        <select name="$name" multiple>
AAA;
            pintar_options($options);
        echo <<<AAA
        </select>
AAA;
        }
        
    }

?>

