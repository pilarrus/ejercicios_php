<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2 - Pilar</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/buttons.css">
    <link rel="stylesheet" href="../../css/posicionamiento.css">
    <link rel="stylesheet" href="../../css/tables.css">
</head>
<body>
    <button class="volver_ejercicios">
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
    <div class="center">
    <?php

        define("NUMTABLAS", 3);
        for($cont=1; $cont <= NUMTABLAS; $cont++){
            echo "<table class='multiplicationTable'>\n";
            echo "<tr>\n";
            echo "<th>Tabla del $cont :</th>\n";
            echo "</tr>\n";
            for($i = 0; $i < 11; $i++){
                echo "<tr>\n";
                echo "<th>$i x $cont = " . $i*$cont . "</th>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
        }

    ?>
    </div>
</body>
</html>
