<?php

    require("../php/funciones_genericas_pintar.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];

    function info_personal() {
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
AAA;
            pintar_label("Nombre");
            pintar_input("text", "nombre");
            echo "<br/>";
            pintar_label("Primer apellido");
            pintar_input("text", "primer_apellido");
            echo "<br/>";
            pintar_label("Segundo apellido");
            pintar_input("text", "segundo_apellido");
            echo <<<AAA
        </fieldset>
AAA;
    };

    $info_personal = 'info_personal';

    function datos_de_acceso() {
        echo <<<AAA
        <fieldset>
            <legend>Datos de acceso</legend>
AAA;
            pintar_label("Usuario");
            pintar_input("text", "usuario");
            echo "<br/>";
            pintar_label("E-mail");
            pintar_input("email", "email");
            echo "<br/>";
            pintar_label("Contraseña");
            pintar_input("password", "contrasenia");
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
    };

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
    
    /*
    $formulario = function() {
        echo <<<AAA
        <div class="center">
        <form action="$_SERVER[PHP_SELF]" method="post">
            <fieldset>
                <legend>Información Personal</legend>
AAA;
                pintar_label("Nombre");
                pintar_input("text", "nombre");
                echo "<br/>";
                pintar_label("Primer apellido");
                pintar_input("text", "primer_apellido");
                echo "<br/>";
                pintar_label("Segundo apellido");
                pintar_input("text", "segundo_apellido");
                echo <<<AAA
            </fieldset>
AAA;
            pintar_button_submit('submit', 'Enviar');
            echo <<<AAA
        </form>
    </div>
AAA;
    };*/

?>