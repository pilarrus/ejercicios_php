<?php
    $archivo = "fondos/fondo.jpeg";
    $imagen = imagecreatefromjpeg($archivo);
    $tamaño = 25;
    $min_x = 5;
    $max_x = 10;
    $x = random_int($min_x, $max_x);
    $texto = "perro";
    $longitud_texto = strlen($texto);
    for ($i=0; $i < $longitud_texto; $i++) {
        $char = $texto[$i];
        $angulo = random_int(0, 90);
        
        $y = 60;
        $fuente = realpath("fuentes/OpenSans-Regular.ttf");
        $color = imagecolorallocate($imagen, 255, 0, 0);
        //$imgText = imagestring($imagen, $tamaño, $x, $y, $texto, $color); imagefttext
        $imgText = imagefttext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, $char);
        $min_x = $max_x;
        $max_x = 10*7;
        $x = random_int($min_x, $max_x);
    }
    
    
    header("Content-Type: image/jpeg");
    imagejpeg($imagen);
    imagedestroy($imagen);

?>