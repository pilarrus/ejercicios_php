<?php

    /*Crear imagen a partir de un fondo*/
    header("Content-Type: image/jpeg");
    $archivo = "fondos/fondo.jpeg";
    $imagen = imagecreatefromjpeg($archivo);
    $fuente = 5;
    $x = 2;
    $y = 1;
    $texto = "perro";
    $color = imagecolorallocate($imagen, 255, 0, 0);
    $img = imagestring($imagen, $fuente, $x, $y, $texto, $color);
    imagejpeg($img);

?>