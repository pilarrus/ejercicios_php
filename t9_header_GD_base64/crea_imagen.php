<?php
    require("funciones_captcha.php");
    
    $archivo = "fondos/fondo.jpeg";
    $imagen = imagecreatefromjpeg($archivo);
    $tamaño = 25;
    $texto = random_string(5);
    $longitud_texto = strlen($texto);

    for ($i=0; $i < $longitud_texto; $i++) {
        $char = $texto[$i];
        $angulo = random_int(-70, 70);
        $x = 20 + $i * 35 + 2;
        $y = 60;
        $fuente = realpath("fuentes/OpenSans-Regular.ttf");
        $color = imagecolorallocate($imagen, 255, 0, 0);
        //$imgText = imagestring($imagen, $tamaño, $x, $y, $texto, $color);
        $imgText = imagefttext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, $char);
    }
    
    header("Content-type:image/jpeg");
    imagejpeg($imagen);
    imagedestroy($imagen);
?>