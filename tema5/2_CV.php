<?php
//require("../php/funciones.php");
require("../php/funciones_de_pintar.php");
require("php/functions_2_CV.php");

$css = ["base", "style", "buttons", "forms", "positions"];

if (isset($_POST['submit'])) {
    paint_CV('Ejercicio 2', $css);
} else {
    paint_form_CV('Ejercicio 2', $css);
}

?>

