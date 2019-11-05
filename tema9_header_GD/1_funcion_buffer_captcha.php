<?php 
    function buffer_captcha() {
        ob_start();
        $archivo = "fondos/fondo.jpeg";
        $imagen = imagecreatefromjpeg($archivo);
        $tamaño = 25;
        $texto = "perro";
        $longitud_texto = strlen($texto);
        for ($i=0; $i < $longitud_texto; $i++) {
            $char = $texto[$i];
            $angulo = random_int(0, 80);
            $x = 20 + $i * 35 + 2;
            $y = 60;
            $fuente = realpath("fuentes/OpenSans-Regular.ttf");
            $color = imagecolorallocate($imagen, 255, 0, 0);
            //$imgText = imagestring($imagen, $tamaño, $x, $y, $texto, $color);
            $imgText = imagefttext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, $char);
        }
        ob_start();
        imagejpeg($imagen);
        $img = ob_get_contents();
        ob_clean();
        imagedestroy($imagen);
        return $img;
    }

    function convertir_a_base_64($image_data) {
        //$imagedata = file_get_contents("tux.jpg");
        $image = base64_encode($imagedata);
        echo $image;
        echo <<<AAA
        <img src="data:image/jpg;base64,$image">
AAA;
    }

?>