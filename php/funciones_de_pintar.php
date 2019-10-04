<?php

    function pintar_button_return_exercises_html(){
        echo <<<AAA
        <button class="return_exercises">
            <a href="../index.php">Volver a Ejercicios</a>
        </button>\n
AAA;
    }

    function paint_button_submit() {
        echo <<<AAA
        <div class="center">
            <input type="submit" name="submit" class="submit"/>
        </div>
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
                <title>$exercise - Pilar</title>\n
AAA;
                pintar_links_css($css);
            echo "</head>\n";

    }

    function pintar_options($xs) {
        foreach($xs as $x) {
            echo "<option value=\"$x\">$x</option>\n";
        }
    }

    function pintar_links_css($nombres) {
        foreach($nombres as $nombre) {
            echo "<link rel=\"stylesheet\" href=\"../css/$nombre.css\">\n";
        }
    }

?>