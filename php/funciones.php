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

    function upload_file($relativeDirectory) {
        $tmp_name = $_FILES['file']['tmp_name'];
        if (is_uploaded_file($tmp_name)) {
            //echo "El fichero ha subido";
            $_FILES['file']['name'] = md5_file($tmp_name) . time();
            //echo $tmp_name;
            $destination  = dirname(__FILE__) . $relativeDirectory;
            echo $destination;
            if (is_dir($destination)) {
                //echo "El directorio existe";
                $name = $_FILES["file"]["name"];
                //echo $name;
                if (move_uploaded_file($tmp_name, $destination . "/" . $name)) {
                    echo "El fichero ha sido movido";
                } else {
                    echo "ERROR. El fichero NO ha sido movido. No es un archivo cargado válido";
                }
            } else {
                echo "ERROR. No se pudo mover fichero, porque no existe el directorio";
            }
        } else {
            echo "ERROR. No se ha subido fichero";
        }
    }

?>