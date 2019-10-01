<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 5 - Pilar</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/buttons.css">
</head>
<body>
    <button class="return_exercises">
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
<?php
    if(isset($_POST['submit'])) {

        require("../../php/funciones.php");
        
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