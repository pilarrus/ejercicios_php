<?php

    function pintar_form_config() {
        echo <<<AAA
        <div class="center">
            <form action="index.php" method="post">
                <div class="center">
                    <label for="idioma">Selecciona el idioma</label>
                    <select name="idioma" id="idioma" require>
                        <option value="0" name="esp">Español</option>
                        <option value="1" name="ing">Inglés</option>
                    </select>
                </div>

                <div class="center">
                    <label for="color_fuente">Selecciona el color de fuente</label>
                    <select name="color_fuente" id="color_fuente" require>
                        <option value="white" name="white">Blanco</option>
                        <option value="black" name="negro">Negro</option>
                    </select>
                </div>

                <div class="center">
                    <label for="">Selecciona el color de fondo</label>
                    <select name="color_fondo" id="color_fondo" require>
                        <option value="red" name="rojo">Rojo</option>
                        <option value="black" name="negro">Negro</option>
                    </select>
                </div>

                <div class="center">
                    <button name="submit" class="submit">Guardar</button>
                </div>
            </form>
        </div>
AAA;
    }

    function pintar_label_input_text($id, $text_label, $name_input) {
        echo "<div class=\"center\">";
            pintar_label($id, $text_label);
            pintar_input_text($id, $name_input);
        echo "</div>";
    }

    function pintar_label($id, $text) {
        echo "<label for="$id">$label</label>";
    }

    function pintar_input_text($id, $name) {
        echo "<input id=\"$id\" type=\"text\" name=\"$name\">";
    }

    function pintar_options($xs) {
        foreach($xs as $x) {
            echo "<option value=\"$x\">$x</option>";
        }
    }

    function pintar_select($id, $name, $xs) {
        echo "<select name=\"color_fuente\" id=\"color_fuente\" require>";
        pintar_options($xs);
        echo "</select>";
    }


?>