<?php
require("../php/funciones.php");
require("../php/funciones_de_pintar.php");
require("php/functions_3_CV.php");

$css = ["base", "style", "buttons", "forms", "positions"];

if (isset($_POST['submit'])) {
    paint_CV('Ejercicio 3', $css);
} else {
    paint_form_CV('Ejercicio 3', $css);
}

?>

