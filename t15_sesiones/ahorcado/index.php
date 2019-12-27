<?php
session_start();

require("./datos.php");
require("./funciones.php");

if(!isset($_SESSION['nombre'])) {
    $_SESSION['intentos'] = 7;
    $_SESSION['fallos'] = 0;
}

$palabra = $palabras[array_rand($palabras)];
$_SESSION['palabra'] = $palabra;


header('Location: ./juego.php');

/*$palabras_usadas = [];
$palabra = $palabras[array_rand($palabras)];
//echo $palabra . "<br/>";
if(!in_array($palabra, $palabras_usadas)) {
    array_push($palabras_usadas, $palabra);
}
var_dump($palabras_usadas);*/
?>