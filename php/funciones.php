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

    function upload_file($namePerson, $first_surname, $second_surname) {
        $tmp_name = $_FILES['file']['tmp_name'];
        if (is_uploaded_file($tmp_name)) {
            //echo "El fichero ha subido";
            $name = "";
            if(isset($namePerson) && isset($first_surname) && isset($second_surname)) {
                $name = $namePerson . "_" . $first_surname . "_" . $second_surname . "_";
            }
            $name .= md5_file($tmp_name) .date('dmy') . time();
            $destination  = dirname(__FILE__) . "/../files";
            //echo $name . " " . $destination;
            if (is_dir($destination)) {
                //echo "El directorio existe";
                if (move_uploaded_file($tmp_name, $destination . "/" . $name)) {
                    echo "El fichero se ha guardado con éxito";
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

    function upload_file_gif_jpeg() {
        $tmp_name = $_FILES['file']['tmp_name'];
        if (is_uploaded_file($tmp_name)) {
            $type = $_FILES['file']['type'];
            $resp = preg_match("/gif$/i", $type) || preg_match("/jpeg$/i", $type);
            return $resp;
        } else {
            echo "ERROR. No se ha subido fichero";
        }
    }

?>