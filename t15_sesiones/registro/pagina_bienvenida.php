<?php
session_start();

require("../../php/funciones_genericas_pintar.php");
$css = ["base", "buttons", "forms", "positions", "style"];


if(isset($_POST['logout'])) {
    header('Location: ./logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenida</title>
    <?php pintar_links_css("../..", $css); ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php pintar_button_submit("logout", "Cerrar sesión", $class='submit');
    echo <<<AAA
    <p>Hola $_SESSION[nombre] $_SESSION[primer_apellido] $_SESSION[segundo_apellido]</p>
AAA;
?>
    </form>
</body>
</html>