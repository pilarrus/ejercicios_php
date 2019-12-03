<?php
    session_start();

    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];
    $campos = ['usuario', 'email', 'contrasenia', 'nombre', 'primer_apellido', 'segundo_apellido', 'sexo'];

    if(isset($_POST['submit'])) {
        $campos = comprobar_campos($campos);
        header('Location: ./formulario_respuesta.php');

    } else {
        header('Location: ./formulario_registro.php');
    }

?>