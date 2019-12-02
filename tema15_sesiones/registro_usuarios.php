<?php
    session_start();

    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];
    $campos = ['nombre', 'primer_apellido', 'segundo_apellido', 'usuario', 'email', 'contrasenia'];

    if(isset($_POST['submit'])) {
        $campos = comprobar_campos($campos);
        //var_dump($_SESSION);
        header('Location: ./formulario_respuesta.php');
        /*$campo_erroneo = false;

        foreach ($campos as $key => $campo) {
            if($campo != NULL) {
                $campo_erroneo = true;
            }
        }

        if($campo_erroneo == true) {
            header('Location: ./formulario_respuesta.php');
        }*/

    } else {
        header('Location: ./formulario_registro.php');
    }

?>