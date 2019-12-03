<?php

    require("../php/funciones_genericas_pintar.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];

    function datos_academicos() {
        $idiomas = ["Inglés" => "ingles", "Francés" => "frances", "Español", "espaniol"];
        $titulaciones = ["E.S.O." => "eso", "Bachillerato" => "bachillerato", "Grado medio" => "grado_medio", "Grado superior" => "grado_superior"];
    }

    function info_personal() {
        $campos = ["Nombre" => "nombre", "Primer apellido" => "primer_apellido", "Segundo apellido" => "segundo_apellido"];
        $sexo = ["Mujer", "Hombre", "NS/NC"];
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
AAA;
            foreach ($campos as $label => $name) {
                pintar_label($label);
                pintar_input("text", $name);
                echo "<br/>";
            }

            pintar_label("Sexo");
            echo "<br/>";
            foreach ($sexo as $key => $value) {
                pintar_input("radio", "sexo", $value, $value);
            }

            echo <<<AAA
        </fieldset>
AAA;
    }

    $info_personal = 'info_personal';

    function datos_de_acceso() {
        $campos = ["Usuario" => "usuario", "E-mail" => "email", "Contraseña" => "contrasenia"];
        echo <<<AAA
        <fieldset>
            <legend>Datos de acceso</legend>
AAA;
            foreach ($campos as $label => $name) {
                pintar_label($label);
                pintar_input("text", $name);
                echo "<br/>";
            }
            echo <<<AAA
        </fieldset>
AAA;
    }

    $datos_de_acceso = 'datos_de_acceso';

    function formulario($datos_de_acceso, $info_personal) {
        $url = "./registro_usuarios.php";
        echo <<<AAA
        <div class="center">
        <form action="$url" method="post">
AAA;
            $datos_de_acceso();
            $info_personal();
            pintar_button_submit('submit', 'Enviar');
            echo <<<AAA
        </form>
    </div>
AAA;
    }

    $formulario = 'formulario';
    
    function pintar_base_html($ruta, $css, $formulario) {
        pintar_cabecera_html($ruta, $css);
        echo "<body>";
        pintar_button_volver_a_ejercicios($ruta);
        $formulario('datos_de_acceso', 'info_personal');
        echo <<<AAA
        </body>
        </html>
AAA;
    }

    pintar_base_html($ruta, $css, $formulario);

?>