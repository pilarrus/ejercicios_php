<?php
    session_start();
    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];

    function info_personal() {
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
AAA;
            pintar_label("Nombre");
            ($_SESSION['nombre'] != "")
            ? pintar_input("text", 'nombre', $_SESSION['nombre'])
            : pintar_input("text", 'nombre', $_SESSION['nombre'], "", 'rojo');
            echo "<br/>";

            pintar_label("Primer apellido");
            ($_SESSION['primer_apellido'] != "")
            ? pintar_input("text", "primer_apellido", $_SESSION['primer_apellido'])
            : pintar_input("text", "primer_apellido", $_SESSION['primer_apellido'], "", 'rojo');
            echo "<br/>";

            pintar_label("Segundo apellido");
            ($_SESSION['segundo_apellido'] != "")
            ? pintar_input("text", "segundo_apellido", $_SESSION['segundo_apellido'])
            : pintar_input("text", "segundo_apellido", $_SESSION['segundo_apellido'], "", 'rojo');
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
            ($_SESSION['usuario'] != "")
            ? pintar_input("text", "usuario", $_SESSION['usuario'])
            : pintar_input("text", "usuario", $_SESSION['usuario'], "", 'rojo');
            echo "<br/>";

            pintar_label("E-mail");
            ($_SESSION['email'] != "")
            ? pintar_input("email", "email", $_SESSION['email'])
            : pintar_input("email", "email", $_SESSION['email'], "", 'rojo');
            echo "<br/>";
            
            pintar_label("Contraseña");
            ($_SESSION['contrasenia'] != "")
            ? pintar_input("password", "contrasenia", $_SESSION['contrasenia'])
            : pintar_input("password", "contrasenia", $_SESSION['contrasenia'], "", 'rojo');
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

    var_dump($_SESSION);

?>