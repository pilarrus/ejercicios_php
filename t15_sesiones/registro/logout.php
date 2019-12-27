<?php
session_start();

require("../../php/funciones_genericas_pintar.php");
$css = ["base", "buttons", "forms", "positions", "style"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
    <?php pintar_links_css("../..", $css); ?>
</head>
<body>
    <?php pintar_button_volver_a_ejercicios("../..");
    echo <<<AAA
    <p>Adiós $_SESSION[nombre] $_SESSION[primer_apellido] $_SESSION[segundo_apellido]</p>
AAA;
    // Destruye todas las variables de sesión.
    $_SESSION = array();

    // Borra la cookie de sesión.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    /* Destruye toda la información asociada con la sesión actual. No destruye ninguna de las
    variables globales asociadas con la sesión, ni destruye la cookie de sesión.
    Cierra la sesión*/
    session_destroy();
    ?>
</body>
</html>