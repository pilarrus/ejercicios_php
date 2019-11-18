<?php
    $string_json = file_get_contents("./idiomas.json", true);
    $json = json_decode($string_json);
    //echo $json->Español->titulo;

    if(isset($_POST['submit'])) {
        setcookie("idioma", $_POST['Idiomas'], time() + 86400);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit(); //termina aquí
    }
    
    $valor_cookie = $_COOKIE['idioma'] ?? 'Español';
    $titulo = $json->$valor_cookie->titulo;
    $español = $json->$valor_cookie->Idiomas->Español;
    $ingles = $json->$valor_cookie->Idiomas->Inglés;
    $boton = $json->$valor_cookie->Botón;
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