<?php

    function paint_form($exercise, $css, $word, $text) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" class="form_border">
                <div class="center">
                    <!--<button name="bold" class="submit">Negrita</button>
                    <button name="italic" class="submit">Cursiva</button>
                    <button name="underline" class="submit">Subrayar</button>-->
                    <button name="lowercase" class="submit">Minúsculas</button>
                    <button name="uppercase" class="submit">Mayúsculas</button>
                    <div class="center">
                        <button name="replace" class="submit">Reemplazar por</button>
                        <input type="text" name="replacer">
                    </div>
                </div>
                <div class="center">
                    <label>Introduce la palabra que quieres modificar</label>
                    <input type="text" name="word" value="$word">
                </div>
                <textarea name="editor" class="editor" contenteditable="true">$text</textarea>
            </form>
        </div>
        </body>
        </html>
AAA;
    }

    /*function bold() {

    }*/

    /*function italic() {

    }*/
    
    /*function underline() {

    }*/
    
    /*function lowercase() {

    }*/
    
    /*function uppercase() {

    }*/
    
?>