<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");

    function pintar_checkbox($xs) {
        foreach($xs as $x) {
            if($x == "Español"){
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\" checked>$x";
            } else {
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\">$x";
            }
        }
    }

    function pintar_formulario_registro($exercise, $css) {
        $idiomas = ["Inglés", "Francés", "Español", "Italiano", "Portugués"];
        $nacionalidades = ["Inglesa", "Francesa", "Española", "Italiana", "Portuguesa"];
        $aficiones = ["Hacer deporte", "Leer", "Estar con amigos", "Ver peliculas"];

        pintar_cabecera_html($exercise, $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
            echo <<<AAA
            <div class="center">
                <form action="$_SERVER[PHP_SELF]" method="post" class="loggin">
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>
                    <div>
                        <label for="">Sexo:</label>
                        <input type="radio" name="sexo" value="H" checked/>Hombre
                        <input type="radio" name="sexo" value="M"/>Mujer
                    </div>
                    <div>
                        <label for="">Idiomas:</label>
AAA;
                        pintar_checkbox($idiomas);
                    echo <<<AAA
                    </div>
                    <div>
                        <label for="nacionalidades">Nacionalidades:</label><br>
                        <select name="nacionalidades[]" id="nacionalidades" multiple="multiple" required>
                            <optgroup label="Elige las nacionalidades que tienes">
AAA;
                                pintar_options($nacionalidades);
                            echo <<<AAA
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <label for="aficiones">Aficiones:</label><br>
                        <select name="aficiones[]" id="aficiones" multiple="multiple" required>
                            <optgroup label="Elige las aficiones que te gusten">
AAA;
                                pintar_options($aficiones);
                            echo <<<AAA
                            </optgroup>
                        </select>
                    </div>
                    <div class="center">
                        <input type="submit" name="submit" value="Enviar" class="submit">
                    </div>
                </form>
            </div>
        </body>
        </html>
AAA;
    }

    function pintar_p_registro($xs) {
        echo "<p>$xs: ";
        foreach($_POST[$xs] as $x) {
            echo $x . ", ";
        }
        echo "</p>\n";
    }


    function registro($exercise, $css) {
        $xs = ["idiomas", "nacionalidades", "aficiones"];

        pintar_cabecera_html($exercise, $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();

        echo "<h2>Datos personales</h2>\n";
        echo "<p>Nombre: $_POST[nombre]</p>\n";
        
        echo ($_POST['sexo'] === 'H') ? "<p>Sexo: Hombre</p>\n" : "<p>Sexo: Mujer</p>\n";

        foreach($xs as $x) {
            pintar_p_registro($x);
        }

        echo "</body>\n";
        echo "</html>\n";
    }

?>