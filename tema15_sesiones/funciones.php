<?php

    function comprobar_campos($campos) {
        foreach ($campos as $key => $campo) {
            establecer_variables_sesion($campo);
        }
    }

    function establecer_variables_sesion($x) {
        if(!empty($_POST[$x])) {
            $_SESSION[$x] = $_POST[$x];
        } else {
            $_SESSION[$x] = "";
        }
    }

    function validar_email($str) {
        return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
    }

    function validar_contrasenia($contrasenia, &$error_contrasenia){
        if(strlen($contrasenia) < 6){
           $error_contrasenia = "La contraseña debe tener al menos 6 caracteres";
           return false;
        }
        if(strlen($contrasenia) > 16){
           $error_contrasenia = "La contraseña no puede tener más de 16 caracteres";
           return false;
        }
        if (!preg_match('`[a-z]`', $contrasenia)){
           $error_contrasenia = "La contraseña debe tener al menos una letra minúscula";
           return false;
        }
        if (!preg_match('`[A-Z]`', $contrasenia)){
           $error_contrasenia = "La contraseña debe tener al menos una letra mayúscula";
           return false;
        }
        if (!preg_match('`[0-9]`', $contrasenia)){
           $error_contrasenia = "La contraseña debe tener al menos un caracter numérico";
           return false;
        }
        $error_contrasenia = "";
        return true;
     }

?>