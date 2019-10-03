<?php
    
    function control_de_acceso($users, $user, $password) {
        if(isset($users[$user]) && $password === $users[$user][0]) {
            echo "<p>Bienvenid@ " . $users[$user][1] . "</p>\n";
        } else {
            echo "<p>Acceso no autorizado</p>\n";
        }
    }

    // Tema 3, ejercicio 5
    function controla_entrada($variable) {
        if(isset($variable)) {
            $variable = strip_tags($variable); //Elimina etiquetas HTML y PHP
            //$variable = htmlentities($variable);
            $variable = htmlspecialchars($variable, ENT_QUOTES, "UTF-8"); //Convierte caracteres especiales en entidades HTML
            $variable = trim($variable); //Elimina espacios que haya al principio y al final
        } else {
            $variable = "";
        }
        return $variable;
    }

    function pintar_button_return_exercises_html(){
        echo <<<AAA
        <button class="return_exercises">
            <a href="../../index.php">Volver a Ejercicios</a>
        </button>
AAA;
    }

    function pintar_cabezera_html($exercise) {
        echo <<<AAA
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>$exercise - Pilar</title>
                <link rel="stylesheet" href="../../css/style.css">
                <link rel="stylesheet" href="../../css/base.css">
                <link rel="stylesheet" href="../../css/buttons.css">
                <link rel="stylesheet" href="../../css/forms.css">
                <link rel="stylesheet" href="../../css/posicionamiento.css">
            </head>
AAA;
    }

    function pintar_checkbox($xs) {
        foreach($xs as $x) {
            if($x == "Español"){
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\" checked>$x";
            } else {
                echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$x\">$x";
            }
        }
    }

    function pintar_control_acceso_html($exercise) {
        pintar_cabezera_html($exercise);
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

    function pintar_formulario_registro($exercise) {
        $idiomas = ["Inglés", "Francés", "Español", "Italiano", "Portugués"];
        $nacionalidades = ["Inglesa", "Francesa", "Española", "Italiana", "Portuguesa"];
        $aficiones = ["Hacer deporte", "Leer", "Estar con amigos", "Ver peliculas"];

        pintar_cabezera_html($exercise);
        echo "<body>\n";
        pintar_button_return_exercises_html();
            echo <<<AAA
            <div class="center">
                <form action="$_SERVER[PHP_SELF]" method="post" class="loggin">
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required>
                        
                    </div>
                    <div>
                        <label for="">Sexo:</label>
                        <input type="radio" name="sexo" value="H" checked/>Hombre
                        <input type="radio" name="sexo" value="M"/>Mujer
                    </div>
                    <div>
                        <label for="">Idiomas:</label>
AAA;
                        pintar_checkbox($idiomas);
                    echo <<<AAA
                    </div>
                    <div>
                        <label for="nacionalidades">Nacionalidades:</label><br>
                        <select name="nacionalidades[]" id="nacionalidades" multiple="multiple" required>
                            <optgroup label="Elige las nacionalidades que tienes">
AAA;
                                pintar_options($nacionalidades);
                            echo <<<AAA
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <label for="aficiones">Aficiones:</label><br>
                        <select name="aficiones[]" id="aficiones" multiple="multiple" required>
                            <optgroup label="Elige las aficiones que te gusten">
AAA;
                                pintar_options($aficiones);
                            echo <<<AAA
                            </optgroup>
                        </select>
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

    function pintar_p($xs) {
        echo "<p>$xs: ";
        foreach($_POST[$xs] as $x) {
            echo $x . ", ";
        }
        echo "</p>\n";
    }

    function pintar_options($xs) {
        foreach($xs as $x) {
            echo "<option value=\"$x\">$x</option>";
        }
    }

    /*function pintar_links_css($nombres) {
        foreach($nombres as $nombre) {
            echo "<link rel=\"stylesheet\" href=\"../../css/$nombre.css\">";
        }
    }*/

    function registro() {
        $xs = ["idiomas", "nacionalidades", "aficiones"];

        pintar_cabezera_html('Ejercicio 3');
        echo "<body>\n";
        pintar_button_return_exercises_html();

        echo "<h2>Datos personales</h2>";
        echo "<p>Nombre: " . $_POST['nombre'] . "</p>\n";
        
        echo ($_POST['sexo'] === 'H') ? "<p>Sexo: Hombre</p>\n" : "<p>Sexo: Mujer</p>\n";

        echo "<p>Idiomas: ";
        foreach($_POST['idiomas'] as $idioma) {
            echo $idioma . ", ";
        }
        echo "</p>\n";
        
        echo "<p>Nacionalidades: ";
        foreach($_POST['nacionalidades'] as $nacionalidad) {
            echo $nacionalidad . ", ";
        }
        echo "</p>\n";

        echo "<p>Aficiones: ";
        foreach($_POST['aficiones'] as $aficion) {
            echo $aficion . ", ";
        }
        echo "</p>\n";
    }
?>