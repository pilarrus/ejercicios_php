<?php
    function random_string($lenght_string) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lenght_chars = strlen($chars);
        $string = "";
        for($i = 0; $i < $lenght_string; $i++) {
            $string .= $chars[rand(0, $lenght_chars - 1)];
        }
        return $string;
    }

    function buffer_captcha($texto, $fondo, $fuente) {
        $imagen = imagecreatefromjpeg($fondo);
        $tamaño = 25;
        $longitud_texto = strlen($texto);
        for ($i=0; $i < $longitud_texto; $i++) {
            $char = $texto[$i];
            $angulo = random_int(0, 80);
            $x = 20 + $i * 35 + 2;
            $y = 60;
            $color = imagecolorallocate($imagen, 255, 0, 0);
            //$imgText = imagestring($imagen, $tamaño, $x, $y, $texto, $color); En horizontal
            $imgText = imagefttext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, $char);
        }
        ob_start();
        imagejpeg($imagen);
        $img = ob_get_contents();
        ob_clean();
        imagedestroy($imagen);
        return $img;
    }

    function convertir_a_base_64($img) {
        $image = base64_encode($img);
        ob_end_flush();
        //ob_end_clean();
        echo <<<AAA
        <div class="center">
            <img src="data:image/jpg;base64,$image">
        </div>
AAA;
    }

?>