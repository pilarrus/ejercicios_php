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

?>