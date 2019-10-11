<?php

function paint_CV($exercise, $css, $namePerson, $first_surname, $second_surname) {
    pintar_cabecera_html($exercise, $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    if (upload_file_gif_jpeg()) {
        upload_file($namePerson, $first_surname, $second_surname);
    } else {
        echo "El fichero no se puede mover porque no tiene extensión .gif, ni .jpeg";
    }
    echo "<br>";
    if(check_input()) {
        echo <<<AAA
        <h2>Datos Personales</h2>
        <p>Nombre: $_POST[name]</p>
        <p>Primer apellido: $_POST[first_surname]</p>
        <p>Segundo apellido: $_POST[second_surname]</p>
AAA;
    }
    echo "</body>\n";
    echo "</html>\n";
}

function paint_form_CV($exercise, $css) {
    pintar_cabecera_html($exercise, $css);
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

function check_input() {
    $resp = true;
    foreach($_POST as $key => $value) {
        if($key == 'age' || $key == 'tfno' || $key == 'num') {
            if(!is_numeric($value)) {
                echo "<p>Debes introducir números en el campo $key</p>";
                $resp = false;
            }
            if($resp == false) {
                break;
            }
        } elseif($key == 'mail'){
            $result = filter_var($value, FILTER_VALIDATE_EMAIL);
            if($result == false) {
                echo "<p>El email no es válido</p>";
            }
            if($resp == false) {
                break;
            }
        } elseif($key == 'idiomas' || $key == 'ofimatica'){
            if(empty($key)) {
                echo "<p>El campo $key no es válido</p>";
            }
            if($resp == false) {
                break;
            }
        } else {
            if(empty($_POST[$key])) {
                echo "<p>El campo $key no es válido</p>";
            }
            if($resp == false) {
                break;
            }
        }
    }
    return $resp;
}

?>