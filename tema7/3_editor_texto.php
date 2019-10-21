<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_3_editor_texto.php");
    require("php/functions_string.php");

    $css = ["base", "buttons", "forms", "positions", "style"];
    $word = "";

    if (isset($_POST['editor'])) {
        $text = controla_entrada($_POST['editor']);

        if (!empty($text)) {
            echo "<p>Texto -> $text</p>";

            if (isset($_POST['word'])) {
                $word = controla_entrada($_POST['word']);

                if (!empty($word)) {
                    echo "<p>Palabra -> $word</p>";
                } else {
                    echo "<p>Es necesario que introduzcas una palabra para ser modificada</p>";
                }
    
                /*if (isset($_POST['bold'])) {
                    echo "<p>Lo que haya escrito debería verse en negrita</p>";
                }
                if (isset($_POST['italic'])) {
                    echo "<p>Lo que haya escrito debería verse en cursiva</p>";
                }
                if (isset($_POST['underline'])) {
                    echo "<p>Lo que haya escrito debería verse en subrayado</p>";
                }*/
                if (isset($_POST['lowercase'])) {
                    echo "<p>Lo que haya escrito debería verse en minúscula</p>";
                }
                if (isset($_POST['uppercase'])) {
                    echo "<p>Lo que haya escrito debería verse en mayúscula</p>";
                }
                if (isset($_POST['replace'])) {
                    /*$response = paint_replace();
                    echo $response;*/
                    //echo "<p>Lo que haya escrito debería reemplazarse por la cadena que haya introducido</p>";
                }
    
            } else {
                $word = "";
                echo "<p>Es necesario que introduzcas una palabra para ser modificada</p>";
            }
        } else {
            echo "<p>Es necesario que introduzcas el texto</p>";
        }

    } else {
        $text = "";
        echo "<p>Es necesario que introduzcas el texto</p>";
    }

    paint_form('Ejercicio 3 - Editor de texto', $css, $word, $text);
?>

