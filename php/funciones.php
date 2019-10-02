<?php

    function button_return_exercises_html(){
        return <<<AAA
        <button class="return_exercises">
            <a href="../../index.php">Volver a Ejercicios</a>
        </button>
AAA;
    }

    function cabezera_html($exercise) {
        return <<<AAA
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
            return "<p>Bienvenid@ " . $users[$user][1] . "</p>\n";
        } else {
            return "<p>Acceso no autorizado</p>\n";
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
            $variable = "eee";
        }
        return $variable;
    }

    // Tema 3, ejercicio 2
    function pintar_control_acceso_html($exercise, $PHP_SELF) {
        $cabezera = cabezera_html($exercise);
        $cuerpo = <<<AAA
        <body>
            <button class="return_exercises">
                <a href="../../index.php">Volver a Ejercicios</a>
            </button>
            <div class="center">
                <form action="$_SERVER[$PHP_SELF]" method="post" class="form_choose_table">
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
        return $cabezera. $cuerpo;
    }
?>