<?php
    session_start();
    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];

    function datos_academicos() {
        $idiomas = ["Inglés" => "ingles", "Francés" => "frances", "Español" => "espaniol"];
        $titulaciones = ["E.S.O." => "eso", "Bachillerato" => "bachillerato", "Grado medio" => "grado_medio", "Grado superior" => "grado_superior"];
        
        echo <<<AAA
        <fieldset>
            <legend>Datos académicos</legend>
AAA;
            pintar_label("Titulaciones");
            pintar_select("titulaciones[]", $titulaciones, true);
            echo "<br/>";

            pintar_label("Idiomas");
            foreach ($idiomas as $label => $value) {
                pintar_input("checkbox", "idiomas[]", $value, $label);
            }

        echo <<<AAA
        </fieldset>
        <br/>
AAA;
    }

    $datos_academicos = 'datos_academicos';

    function info_personal() {
        $campos = ["Nombre" => "nombre", "Primer apellido" => "primer_apellido", "Segundo apellido" => "segundo_apellido"];
        $sexo = ["Mujer", "Hombre", "NS/NC"];
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
AAA;
            foreach ($campos as $label => $name) {
                pintar_label($label);
                ($_SESSION[$name] != "")
                ? pintar_input("text", $name, $_SESSION[$name])
                : pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                echo "<br/>";
            }
            
            pintar_label("Sexo");
            echo "<br/>";
            foreach ($sexo as $key => $value) {
                ($_SESSION['sexo'] == $value)
                ? pintar_input("radio", "sexo", $_SESSION['sexo'], $value, "", true)
                : pintar_input("radio", "sexo", $value, $value, "rojo");
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
                ($_SESSION[$name] != "")
                ? pintar_input("text", $name, $_SESSION[$name])
                : pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                echo "<br/>";
            }

            echo <<<AAA
        </fieldset>
AAA;
    }

    $datos_de_acceso = 'datos_de_acceso';

    function formulario($datos_de_acceso, $info_personal, $datos_academicos) {
        $url = "./registro_usuarios.php";
        echo <<<AAA
        <div class="center">
        <form action="$url" method="post">
AAA;
            $datos_de_acceso();
            $info_personal();
            $datos_academicos();
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
        $formulario('datos_de_acceso', 'info_personal', 'datos_academicos');
        echo <<<AAA
        </body>
        </html>
AAA;
    }

    pintar_base_html($ruta, $css, $formulario);

    var_dump($_SESSION);
