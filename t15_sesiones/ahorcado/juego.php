<?php
session_start();

require("../../php/funciones_genericas_pintar.php");
require("./funciones.php");
require("./datos.php");

$_SESSION['nombre'] = "usuario";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ahorcado</title>
    <?php pintar_links_css("../..", $css);?>
</head>
<body>
    <?php
    pintar_button_volver_a_ejercicios("../..");
    
    if(isset($_POST['char'])) {
        
    } else {
        echo "<p>$_SESSION[palabra]</p>";
        ocultar_palabra();
    }
    
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <?php
    foreach ($abecedario as $char) {
        echo <<<AAA
        <button type="submit" name="char" value="$char" class="char">$char</button>
AAA;
    }
    ?>
    </form>
</body>
</html>