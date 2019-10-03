<?php

    function button_return_exercises_html(){
        echo <<<AAA
        <button class="return_exercises">
            <a href="../../index.php">Volver a Ejercicios</a>
        </button>
AAA;
    }

    function cabezera_html($exercise) {
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

    // Tema 3, ejercicio 2
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

    // Tema 3, ejercicio 2
    function pintar_control_acceso_html($exercise) {
        cabezera_html($exercise);
        echo <<<AAA
        <body>
            <button class="return_exercises">
                <a href="../../index.php">Volver a Ejercicios</a>
            </button>
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
        cabezera_html();
        echo "<body>\n";
        button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="../php/ejercicio3.php" method="post" class="loggin">
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
                    <input type="checkbox" name="idiomas[]" id="" value="Inglés">Inglés
                    <input type="checkbox" name="idiomas[]" id="" value="Francés">Francés
                    <input type="checkbox" name="idiomas[]" id="" value="Español" checked>Español
                    <input type="checkbox" name="idiomas[]" id="" value="Italiano">Italiano
                    <input type="checkbox" name="idiomas[]" id="" value="Portugués">Portugués
                </div>
                <div>
                    <label for="nacionalidades">Nacionalidades:</label><br>
                    <select name="nacionalidades[]" id="nacionalidades" multiple="multiple" required>
                        <optgroup label="Elige las nacionalidades que tienes">
                            <option value="Francesa">Francesa</option>
                            <option value="Española">Española</option>
                            <option value="Italiana">Italiana</option>
                            <option value="Portuguesa">Portuguesa</option>
                        </optgroup>
                    </select>
                </div>
                <div>
                    <label for="aficiones">Aficiones:</label><br>
                    <select name="aficiones[]" id="aficiones" multiple="multiple" required>
                        <optgroup label="Elige las aficiones que te gusten">
                            <option value="Hacer deporte">Hacer deporte</option>
                            <option value="Leer">Leer</option>
                            <option value="Estar con amigos">Estar con amigos</option>
                            <option value="Ver peliculas">Ver peliculas</option>
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

    function registro() {
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