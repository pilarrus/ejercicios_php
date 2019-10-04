<?php
    //require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("php/functions_upload_files.php");

    $css = ["base", "style", "buttons", "forms", "positions"];

    if (isset($_POST['submit'])) {
        //print_r($_FILES);
        //echo $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        if (is_uploaded_file($tmp_name)) {
            //echo "El fichero ha subido";
            $_FILES['file']['name'] = md5_file($tmp_name) . time();
            //echo $tmp_name;
            $destination  = dirname(__FILE__) . "/../files";
            
            if (is_dir($destination)) {
                //echo "El directorio existe";
                $name = basename($_FILES["file"]["name"]);
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
    } else {
        paint_form_upload_files('Ejercicio 1', $css);
    }
?>