<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    $css = ["base", "buttons", "forms", "positions", "style"];
    $xs = "";

    if (isset($_POST['editor'])) {
        $text = controla_entrada($_POST['editor']);

        if (!empty($text)) {
            echo "<p>Texto -> $text</p>";

            if (isset($_POST['xs'])) {
                $xs = controla_entrada($_POST['xs']);

                if (!empty($xs)) {
                    echo "<p>Palabra -> $xs</p>";
                } else {
                    echo "<p>Es necesario que introduzcas una palabra para ser modificada</p>";
                }
    
                if (isset($_POST['bold'])) {
                    echo "<p>Lo que haya escrito debería verse en negrita</p>";
                }
                if (isset($_POST['italic'])) {
                    echo "<p>Lo que haya escrito debería verse en cursiva</p>";
                }
                if (isset($_POST['underline'])) {
                    echo "<p>Lo que haya escrito debería verse en subrayado</p>";
                }
                if (isset($_POST['lowercase'])) {
                    echo "<p>Lo que haya escrito debería verse en minúscula</p>";
                    
                }
                if (isset($_POST['uppercase'])) {
                    echo "<p>Lo que haya escrito debería verse en mayúscula</p>";
                }
                if (isset($_POST['replace'])) {
                    echo "<p>Lo que haya escrito debería reemplazarse por la cadena que haya introducido</p>";
                }
    
            } else {
                $xs = "";
                echo "<p>Es necesario que introduzcas una palabra para ser modificada</p>";
            }
        } else {
            echo "<p>Es necesario que introduzcas el texto</p>";
        }

    } else {
        $text = "";
        echo "<p>Es necesario que introduzcas el texto</p>";
    }

    pintar_cabecera_html('Ejercicio 1 - Editor de texto', $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    echo <<<AAA
    <div class="center">
        <form action="$_SERVER[PHP_SELF]" method="post" class="form_border">
            <div class="center">
                <button name="bold" class="submit">Negrita</button>
                <button name="italic" class="submit">Cursiva</button>
                <button name="underline" class="submit">Subrayar</button>
                <button name="lowercase" class="submit">Minúsculas</button>
                <button name="uppercase" class="submit">Mayúsculas</button>
                <button name="replace" class="submit">Reemplazar</button>
            </div>
            <div class="center">
                <label>Introduce la palabra que quieres modificar</label>
                <input type="text" name="xs" value="$xs">
            </div>
            <textarea name="editor" class="editor">$text</textarea>
        </form>
    </div>
    </body>
    </html>
AAA;
?>

