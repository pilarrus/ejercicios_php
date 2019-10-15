<?php

function paint_form($exercise, $css) {
    pintar_cabecera_html($exercise, $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    echo <<<AAA
        <div class="center">
            <form action="$_SERVER[PHP_SELF]" method="post" class="form_border form_padding">
                <div>
                    <label for="">Nombre:</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="">Primer apellido:</label>
                    <input type="text" name="first_surname" required>
                </div>
                <div>
                    <label for="">Segundo apellido:</label>
                    <input type="text" name="second_surname" required>
                </div>
AAA;
                paint_button_submit();
            echo <<<AAA
            </form>
        </div>
    </body>
    </html>
AAA;
}

function paint_image($exercise, $css) {
    $name = controla_entrada($_POST['name']);
    $first_surname = controla_entrada($_POST['first_surname']);
    $second_surname = controla_entrada($_POST['second_surname']);

    $regex = "/$name$first_surname$second_surname/i";

    $direction = "../files/";
    $images = scandir($direction);
        
    pintar_cabecera_html($exercise, $css);
    echo "<body>";
    pintar_button_return_exercises_html();
    echo <<<AAA
        <div class="center">
            <p>$name $first_surname $second_surname</p>
        </div>
        <div class="center">
AAA;
    $resp = false;
    foreach($images as $image) {
        if(preg_match($regex, $image)) {
            $file = $direction . $image;
            echo "<img src=$file alt=\"image\" class=\"photo\">";
            $resp = true;
        }
    }
    if(!$resp) {
        echo "<p>No tiene imágenes asociadas</p>";
    }
    echo <<<AAA
        </div>
    </body>
    </html>
AAA;
}

?>