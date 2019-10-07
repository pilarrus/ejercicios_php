<?php

function paint_CV($exercise, $css) {
    pintar_cabecera_html('Ejercicio 2', $css);
    echo "<body>\n";
    pintar_button_return_exercises_html();
    //upload_file($relativeDirectory);
    echo "Estoy en el if";
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
            paint_button_submit();
            
            echo <<<AAA
        </form>
    </div>
</body>
</html>
AAA;
}

?>