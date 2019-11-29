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
            </form>
        </div>
AAA;
        };
        pintar_base_html($ruta, $css, $funcion);
    }

?>