<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de multiplicar - Pilar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <button>
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
    <button>
        <a href="../html/ejercicio5.html">Volver a Ejercicio 5</a>
    </button>
    <div class="center">
    <table>
        <?php 

        if (isset($_GET['table']) && is_numeric($_GET['table'])) {
            $num = $_GET['table'];
            echo "<table class='multiplicationTable'>\n";
            echo "<tr>\n";
            echo "<th>Tabla del $num</th>\n";
            echo "</tr>\n";
            for($i = 0; $i < 11; $i++) {
                echo "<tr>\n";
                echo "<th>$i x $num = " . $i*$num . "</th>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
        } else {
            echo "<p>ERROR</p>";
        }
        
        ?>
    </table>
    </div>
</body>
</html>