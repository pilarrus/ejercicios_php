<?php
    // Si pongo el nombre 'pilar' $_SESSION tendrá los valores de esa sesión.
    //session_name("pilar");

    // Al poner otro nombre mostrará los valores que tenga en este caso 'juan'.
    //session_name("juan");

    // Si no pongo nombre por defecto cogerá los valores de la sesion existente
    session_start();

    var_dump($_SESSION);

?>