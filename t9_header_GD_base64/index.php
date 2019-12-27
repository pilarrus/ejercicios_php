<?php
    require("../php/funciones.php");
    $css = ["base", "buttons", "forms", "positions", "style"];

    if(isset($_POST['submit'])) {
        if(isset($_POST['captcha'])) {
            $text_captcha = $_GET["valor"];
            $text_input = controla_entrada($_POST['captcha']);

            if($text_captcha === $text_input) {
                header("Location: ./cod_correcto.php");
            } else {
                header("Location: ./error.php?input=$text_input&captcha=$text_captcha");
            }
        }

    } else {
        header("Location: ./pintar_form_captcha.php");
    }

?>