<?php

function establecer_palabra($palabras) {
    $_SESSION['palabra'] = $palabras[array_rand($palabras)];
}

function comprobar_caracter($char) {
    $longitud_palabra = strlen($_SESSION['palabra']);
    for ($i=0; $i < $longitud_palabra; $i++) {
        $letra = strtoupper($_SESSION['palabra'][$i]);
        if($char == $letra) {
            $_SESSION['palabra_semioculta'][$i] = $char;
        } 
    }
    semiocultar_palabra($_SESSION['palabra_semioculta']);
}

function semiocultar_palabra($palabra) {
    $longitud_palabra = strlen($palabra);
    for ($i=0; $i < $longitud_palabra; $i++) {
        $letra = $palabra[$i];

        $_SESSION['palabra_semioculta'] .= ($letra != " ") ? "_ " : "&nbsp;&nbsp;";
    }
    echo "<p>$_SESSION[palabra_semioculta]</p>";
}

function ocultar_palabra() {
    $longitud_palabra = strlen($_SESSION['palabra']);
    echo "<p>";
    for ($i=0; $i < $longitud_palabra; $i++) {
        $letra = strtoupper($_SESSION['palabra'][$i]);

        echo ($letra != " ") ? "_ " : "&nbsp;&nbsp;";
    }
    echo "</p>";
}
