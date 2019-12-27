<?php
    $text_captcha = $_GET['captcha'];
    $text_input = $_GET['input'];
    
    if(empty($text_input)) {
        $resp = "no has introducido texto";
    } else {
        $resp = "la palabra que has introducido ($text_input) no se corresponde con el texto del captcha ($text_captcha)";
    }

    echo "PÁGINA DE ERROR - Serás redirigido porque $resp";
    $page = "./index.php";
    $sec = "10";
    header("Refresh: $sec; url=$page");
?>