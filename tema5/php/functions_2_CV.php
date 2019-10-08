<?php

function paint_CV($exercise, $css) {
    pintar_cabecera_html('Ejercicio 2', $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    //upload_file($relativeDirectory);
    echo "Estoy en el if";
    print_r($_POST);
    echo "</body>\n";
    echo "</html>\n";
}

function paint_form_CV($exercise, $css) {
    pintar_cabecera_html('Ejercicio 2', $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    echo <<<AAA
    <div class="center">
        <form action="$_SERVER[PHP_SELF]" method="post" enctype="multipart/form-data" class="form_border form_padding">
AAA;
            paint_personal_information_form();
            paint_contact_form();
            paint_address_form();
            paint_work_experience_form();
            paint_education_form();
            paint_languages_form();
            paint_ofimatica_form();
            paint_button_submit();
            
            echo <<<AAA
        </form>
    </div>
</body>
</html>
AAA;
}

/*function paint_ofimatica_form() {
    $office = ["Word", "Excel", "Paint"];
    echo <<<AAA
        <fieldset>
            <legend>Ofimática</legend>
            <div>
                <select name="ofimatica[]" id="ofimatica" multiple="multiple">
                    <optgroup label="Elige las que tienes experiencia">
AAA;
                pintar_options($office);
            echo <<<AAA
            </optgroup>
        </select>
            </div>
        </fieldset>
AAA;
}*/

?>