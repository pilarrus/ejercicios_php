<?php
    $array_idiomas['Español']['titulo'] = "Selecciona tus preferencias";
    $array_idiomas['Español']["Idiomas"] = ["Español", "Inglés"];
    $array_idiomas['Español']["Botón"] = "Guardar";

    $array_idiomas['Inglés']['titulo'] = "Select your preferences";
    $array_idiomas['Inglés']["Idiomas"] = ["Spanish", "English"];
    $array_idiomas['Inglés']["Botón"] = "Save";

    if(isset($_POST['submit'])) {
        setcookie("idioma", $_POST['Idiomas'], time() + 86400);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit(); //termina aquí
    }
    
    $valor_cookie = $_COOKIE['idioma'] ?? 'Español';
    $titulo = $array_idiomas[$valor_cookie]["titulo"];
    $español = $array_idiomas[$valor_cookie]["Idiomas"][0];
    $ingles = $array_idiomas[$valor_cookie]["Idiomas"][1];
    $boton = $array_idiomas[$valor_cookie]["Botón"];
    echo <<<AAA
    <div class="center">
        <form action="$_SERVER[PHP_SELF]" method="POST">
            <h2>$titulo</h2>
            <div class="center">
                <select name="Idiomas" id="">
                    <option value="Español">$español</option>
                    <option value="Inglés">$ingles</option>
                </select>
            </div>
            <div class="center">
                <button name="submit" type="submit">$boton</button>
            </div>
        </form>
    </div>
AAA;

?>