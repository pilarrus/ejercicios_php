<?php
    //require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    //require("php/functions_4_visualizar_foto.php");
    $css = ["base", "style", "buttons", "forms", "positions"];

    if(isset($_POST['submit'])) {
        echo "Estoy en el if, deberia mostrar la/s imagen/es si encuentra ";

    } else {
        pintar_cabecera_html('Ejercicio 4', $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
            <div class="center">
                <form action="$_SERVER[PHP_SELF]" method="post" class="form_border form_padding">
                    <div>
                        <label for="">Nombre:</label>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <label for="">Apellidos:</label>
                        <input type="text" name="surnames" required>
                    </div>
AAA;
                    paint_button_submit();
                echo <<<AAA
                </form>
            </div>
        </body>
        </html>
AAA;
    }

?>
