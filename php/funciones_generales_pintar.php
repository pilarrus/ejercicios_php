<?php

    function pintar_label($texto, $id = "") {
        echo <<<AAA
        <label for="$id">$texto</label>
AAA;
    }

    function pintar_input($type, $name, $value = "", $texto = "", $id = "") {
        echo <<<AAA
        <input type="$type" name="$name" value="$value id="$id">$texto
AAA;
    }

    function pintar_button_submit($name, $texto) {
        echo <<<AAA
        <button type="submit" name="$name" value="$name">$texto</button>
AAA;
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

