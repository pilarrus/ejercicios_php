<?php

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

function paint_CV($exercise, $css, $namePerson, $first_surname, $second_surname) {
    //var_dump($_POST);
    pintar_cabecera_html($exercise, $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    if (upload_file_gif_jpeg()) {
        upload_file($namePerson, $first_surname, $second_surname);
    }
    echo "<br>";
    if(check_input()) {
        $name = controla_entrada($_POST['name']);
        $first_name = controla_entrada($_POST['first_surname']);
        $second_surname = controla_entrada($_POST['second_surname']);
        $street = controla_entrada($_POST['street']);
        $city = controla_entrada($_POST['city']);
        $works = controla_entrada($_POST['works']);
        $education = controla_entrada($_POST['education']);
        echo <<<AAA
        <h2>Datos Personales</h2>
        <p>Nombre: $name</p>
        <p>Primer apellido: $first_name</p>
        <p>Segundo apellido: $second_surname</p>
        <p>Edad: $_POST[age]</p>
        <h2>Contacto</h2>
        <p>Telefono: $_POST[tfno]</p>
        <p>E-mail: $_POST[mail]</p>
        <h2>Dirección</h2>
        <p>Calle: $street</p>
        <p>Nº: $_POST[num]</p>
        <p>Población: $city</p>
        <h2>Experiencia Laboral</h2>
        <p>$works</p>
        <h2>Formación</h2>
        <p>$education</p>
        <h2>Idiomas</h2>
        <p>
AAA;
        foreach($_POST['idiomas'] as $key => $value) {
            echo $value . ", ";
        }
        echo <<<AAA
        </p>
        <h2>Ofimática</h2>
        <p>
AAA;
        foreach($_POST['ofimatica'] as $key => $value) {
            echo $value . ", ";
        }
        echo "</p>";
    }
    echo "</body>\n";
    echo "</html>\n";
}


function check_input() {
    foreach($_POST as $key => $value) {
        if($key == 'age' || $key == 'tfno' || $key == 'num') {
            if(!is_numeric($value)) {
                echo "<p>Debes introducir números en el campo $key</p>";
                return false;
            }    
        } elseif($key == 'mail'){
            $mail = filter_var($value, FILTER_VALIDATE_EMAIL);
            if($mail == false) {
                echo "<p>El email no es válido</p>";
                return false;
            }      
        } else {
            if(empty($_POST[$key])) {
                echo "<p>El campo $key no es válido</p>";
                return false;
            } 
        }
    }
    if(!isset($_POST['idiomas'])) {
        echo "<p>El campo idiomas no es válido</p>";
        return false;
    }
    if(!isset($_POST['ofimatica'])) {
        echo "<p>El campo ofimatica no es válido</p>";
        return false;
    }
    return true;
}

?>