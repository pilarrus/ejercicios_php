<?php
    function pintar_form_registro($ruta, $css) {
        $funcion = function() {
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
        };
        pintar_base_html($ruta, $css, $funcion);
    }

    function pintar_resultado_registro() {
        $campos = ['nombre', 'primer_apellido', 'segundo_apellido'];
        foreach ($campos as $key => $campo) {
            comprobar_campo($campo);
        }
    }

    function comprobar_campo($x) {
        if(!empty($_POST[$x])) {
            $_SESSION[$x] = $_POST[$x];
        } else {
            echo "<p>Debes introducir el $x</p>";
        }
    }

?>