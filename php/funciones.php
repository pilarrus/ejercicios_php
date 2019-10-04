<?php

    function control_de_acceso($users, $user, $password) {
        if(isset($users[$user]) && $password === $users[$user][0]) {
            echo "<p>Bienvenid@ " . $users[$user][1] . "</p>\n";
        } else {
            echo "<p>Acceso no autorizado</p>\n";
        }
    }

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

?>