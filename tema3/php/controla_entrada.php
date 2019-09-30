<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 5 - Pilar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <button>
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
<?php
    if(isset($_POST['submit'])) {

        function controla_entrada($variable) {
            if(isset($variable)) {
                $variable = strip_tags($variable); //Elimina etiquetas HTML y PHP
                $variable = htmlspecialchars($variable, ENT_QUOTES, "UTF-8"); //Convierte caracteres especiales en entidades HTML
                $variable = trim($variable); //Elimina espacios que haya al principio y al final
            } else {
                $variable = "eee";
            }
            return $variable;
        }
        
        $aristoteles = controla_entrada($_POST['aristoteles']);
        $cervantes = controla_entrada($_POST['cervantes']);
        echo "<p>$aristoteles</p>";
        echo "<p>$cervantes</p>";

    } else {
        header("Location: ../html/ejercicio4.html");
    }
?>

</body>
</html>