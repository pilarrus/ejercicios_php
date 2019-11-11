<?php
    //require("../../funciones_de_pintar.php")

    if(isset($_POST['submit'])) {;
        var_dump($_POST);
        
        setcookie('preferencias[idioma]', $_POST['idioma']);
        setcookie('preferencias[fuente]', $_POST['color_fuente']);
        setcookie('preferencias[fondo]', $_POST['color_fondo']);

        header("Location: ./ver_formulario.php");
        
    } else {
        echo <<<AAA
        <div class="center">
            <form action="" method="post">
                <div class="center">
                    <label for="idioma">Selecciona el idioma</label>
                    <select name="idioma" id="idioma" require>
                        <option value="0" name="esp">Español</option>
                        <option value="1" name="ing">Inglés</option>
                    </select>
                </div>

                <div class="center">
                    <label for="color_fuente">Selecciona el color de fuente</label>
                    <select name="color_fuente" id="color_fuente" require>
                        <option value="white" name="white">Blanco</option>
                        <option value="black" name="negro">Negro</option>
                    </select>
                </div>

                <div class="center">
                    <label for="">Selecciona el color de fondo</label>
                    <select name="color_fondo" id="color_fondo" require>
                        <option value="red" name="rojo">Rojo</option>
                        <option value="black" name="negro">Negro</option>
                    </select>
                </div>

                <div class="center">
                    <button name="submit" class="submit">Enviar</button>
                </div>
            </form>
        </div>
AAA;
    }
