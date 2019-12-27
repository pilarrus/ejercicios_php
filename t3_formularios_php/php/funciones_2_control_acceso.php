<?php

    function pintar_control_acceso_html($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
            echo <<<AAA
            <div class="center">
                <form action="$_SERVER[PHP_SELF]" method="post" class="form_choose_table">
                    <div class="center">
                        <label for="">Usuario</label>
                        <input type="text" name="usuario" required/>
                    </div>
                    <div class="center">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" required/>
                    </div>
                    <div class="center">
                        <input type="submit" name="submit" class="submit"/>
                    </div>
                </form>
            </div>
        </body>
        </html>
AAA;
    }
?>