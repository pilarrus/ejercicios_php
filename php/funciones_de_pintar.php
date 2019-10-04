<?php

    function pintar_button_return_exercises_html(){
        echo <<<AAA
        <button class="return_exercises">
            <a href="../index.php">Volver a Ejercicios</a>
        </button>
AAA;
    }

    function pintar_cabecera_html($exercise, $css) {
        echo <<<AAA
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>$exercise - Pilar</title>
AAA;
                pintar_links_css($css);
            echo "</head>";

    }

    function pintar_options($xs) {
        foreach($xs as $x) {
            echo "<option value=\"$x\">$x</option>";
        }
    }

    function pintar_links_css($nombres) {
        foreach($nombres as $nombre) {
            echo "<link rel=\"stylesheet\" href=\"../css/$nombre.css\">";
        }
    }

?>