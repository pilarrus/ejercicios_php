<?php
    //require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    $css = ["base", "buttons", "forms", "positions", "style"];

    
    pintar_cabecera_html('Ejercicio 1 - Editor de texto', $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    echo <<<AAA
        <form action="$_SERVER[PHP_SELF]" method="post">
            <button name="bold">N</button>
            <textarea name="editor" class="editor">Escribe aquí...</textarea>
        </form>
    </body>
    </html>
AAA;

    if (isset($_POST['bold'])) {
        echo "Lo que haya escrito debería verse en negrita";
    }

?>