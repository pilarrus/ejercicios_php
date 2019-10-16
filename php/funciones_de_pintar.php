<?php

    function paint_address_form() {
        echo <<<AAA
        <fieldset>
            <legend>Dirección</legend>
            <div>
                <label for="">Calle:</label>
                <input type="text" name="street">
                <label for="">Nº</label>
                <input type="number" name="num">
                <label for="">Población:</label>
                <input type="text" name="city">
            </div>
        </fieldset>
AAA;
    }

    function pintar_button_return_exercises_html() {
        echo <<<AAA
        <button class="return_exercises">
            <a href="../index.php">Volver a Ejercicios</a>
        </button>\n
AAA;
    }

    function paint_button_submit() {
        echo <<<AAA
        <div class="center">
            <input type="submit" name="submit" class="submit"/>
        </div>
AAA;
    }

    function pintar_cabecera_html($exercise, $css) {
        echo <<<AAA
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>$exercise - Pilar</title>\n
AAA;
                pintar_links_css($css);
            echo "</head>\n";
    }

    function paint_contact_form() {
        echo <<<AAA
        <fieldset>
            <legend>Contacto</legend>
            <div>
                <label for="">Teléfono:</label>
                <input type="tel" name="tfno" maxlength="9" minlegth="9">
            </div>
            <div>
                <label for="">E-mail:</label>
                <input type="email" name="mail">
            </div>
        </fieldset>
AAA;
    }

    function pintar_checkbox($xs) {
        foreach($xs as $x) {
            if($x == "Español"){
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\" checked>$x";
            } else {
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\">$x";
            }
        }
    }

    function paint_education_form() {
        echo <<<AAA
        <fielset>
            <legend>Formación</legend>
            <div>
                <!--<label>Introduce la formación que tienes:</label>-->
                <textarea name="education" rows="10" cols="50"></textarea>
            </div>
        </fielset>
AAA;
    }
    
function paint_languages_form() {
    $idiomas = ["Inglés", "Francés", "Español", "Italiano", "Portugués"];
    
    echo <<<AAA
        <fielset>
            <legend>Idiomas</legend>
            <div>
AAA;
                pintar_checkbox($idiomas);
            echo <<<AAA
            </div>
        </fielset>
AAA;
}

    function pintar_links_css($nombres) {
        foreach($nombres as $nombre) {
            echo "<link rel=\"stylesheet\" href=\"../css/$nombre.css\">\n";
        }
    }

    function paint_personal_information_form() {
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
            <div>
                <label for="">Nombre:</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Primer apellido:</label>
                <input type="text" name="first_surname">
            </div>
            <div>
                <label for="">Segundo apellido:</label>
                <input type="text" name="second_surname">
            </div>
            <div>
                <label for="">Edad:</label>
                <input type="number" name="age">
            </div>   
            <div>
            <label for="file">Foto</label>
                <input type="file" name="file" id="file">
            </div>
        </fieldset>
AAA;
    }

    function paint_ofimatica_form() {
        $office = ["Word", "Excel", "Paint"];
        echo <<<AAA
            <fieldset>
                <legend>Ofimática</legend>
                <div>
                    <select name="ofimatica[]" id="ofimatica" multiple="multiple">
                        <optgroup label="Tienes experiencia en">
AAA;
                    pintar_options($office);
                echo <<<AAA
                </optgroup>
            </select>
                </div>
            </fieldset>
AAA;
    }

    function pintar_options($xs) {
        foreach($xs as $x) {
            echo "<option value=\"$x\">$x</option>\n";
        }
    }

    function paint_work_experience_form() {
        echo <<<AAA
        <fielset>
            <legend>Experiencia laboral</legend>
            <div>
                <!--<label>Introduce la experiencia laboral que tienes:</label>-->
                <textarea name="works" rows="10" cols="50"></textarea>
            </div>
        </fielset>
AAA;
    }

?>