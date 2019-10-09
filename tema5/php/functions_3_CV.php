<?php

function paint_CV($exercise, $css) {
    pintar_cabecera_html($exercise, $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    upload_file();
    echo "<br>";
    /*print_r($_POST);
    echo "<br>";*/
    check_input();
    echo "<p>Nombre: " . $_POST['name'] . "</p>";
    echo "<br>";
    print_r($_POST);
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
    foreach($_POST as $key => $value) {
        if($key == 'age' || $key == 'tfno' || $key == 'num') {
            if(!is_numeric($value)) {
                echo "<p>Debes introducir números en el campo $key</p>";
            }
        } elseif($key == 'mail'){
            $result = filter_var($value, FILTER_VALIDATE_EMAIL);
            if($result == false) {
                echo "<p>El email no es válido</p>";
            }
        } elseif($key == 'idiomas' || $key == 'ofimatica'){
            
        } else {
            if(!empty($_POST[$key])) {
                $_POST[$key] = controla_entrada($value);
            } else {
                echo "<p>El campo $key no es válido</p>";
            }
        }
    }
}

?>