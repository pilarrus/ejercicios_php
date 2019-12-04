<?php
    session_start();
    
    require("./funciones.php");
    $campos = ['usuario', 'email', 'contrasenia', 'nombre', 'primer_apellido', 'segundo_apellido', 'sexo', 'titulaciones', 'idiomas'];

    if(isset($_POST['submit'])) {
        comprobar_campos($campos);
        header('Location: ./formulario_respuesta.php');

    } else {
        header('Location: ./formulario_registro.php');
    }

?>