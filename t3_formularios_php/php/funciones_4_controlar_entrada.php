<?php

    function pintar_formulario_control_entrada($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>\n";
        pintar_button_return_exercises_html();
        echo <<<AAA
            <div class="center">
                <form action="$_SERVER[PHP_SELF]" method="post" class="cite">
                    <div>
                        <label for="">Aristóteles (filósofo griego) dijo:</label><br>
                        <textarea name="aristoteles" rows="5" cols="50">” La amistad es un alma que habita en dos cuerpos; un corazón que habita en dos almas.”</textarea>
                    </div>
                    <div>
                        <label for="">Y Miguel de Cervantes citó:</label><br>
                        <textarea name="cervantes" rows="5" cols="50">“Confía en el tiempo, que suele dar dulces salidas a muchas amargas dificultades”</textarea>
                    </div>
                    <div class="center">
                        <input type="submit" name="submit" value="Enviar" class="submit">
                    </div>
                </form>
            </div>
        </body>
        </html>
AAA;
    }
    
?>