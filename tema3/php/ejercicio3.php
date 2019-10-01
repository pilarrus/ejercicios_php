<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 3 - Pilar</title>
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
        echo "<h2>Datos personales</h2>";
        echo "<p>Nombre: " . $_POST['nombre'] . "</p>\n";
        
        echo ($_POST['sexo'] === 'H') ? "<p>Sexo: Hombre</p>\n" : "<p>Sexo: Mujer</p>\n";

        echo "<p>Idiomas: ";
        foreach($_POST['idiomas'] as $idioma) {
            echo $idioma . ", ";
        }
        echo "</p>\n";
        
        echo "<p>Nacionalidades: ";
        foreach($_POST['nacionalidades'] as $nacionalidad) {
            echo $nacionalidad . ", ";
        }
        echo "</p>\n";

        echo "<p>Aficiones: ";
        foreach($_POST['aficiones'] as $aficion) {
            echo $aficion . ", ";
        }
        echo "</p>\n";

    } else {
        header("Location: ../html/registro.html");
    }
?>

</body>
</html>