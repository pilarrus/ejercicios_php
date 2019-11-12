<?php

    if(isset($_COOKIE["preferencias['idioma']"])) {
        var_dump($_COOKIE);
    } else {
        echo "No existen las cookies";
    }

?>