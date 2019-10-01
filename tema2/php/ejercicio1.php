<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 1 - Pilar</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/buttons.css">
    <link rel="stylesheet" href="../../css/posicionamiento.css">
    <link rel="stylesheet" href="../../css/tables.css">
</head>
<body>
    <button class="return_exercises">
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
    <div class="center">
    <?php 
        $temperaturas = array();
        $temperaturas['Caja_1'] = array(1,1,1,1,1,2,2,2,3,1,4);
        $temperaturas['Caja_2'] = array(1,3,2,2,3,3,4,4,1,1,1);
        $temperaturas['Caja_3'] = array(1,1,5,5,1,2,2,3,3,4,1);
        $temperaturas['Caja_4'] = array(1,5,1,1,1,1,1,2,2,2,3);
        $temperaturas['Caja_5'] = array(1,1,1,2,2,2,3,1,1,1,5);

        echo "<table>\n";
        echo "<tr>\n<th>Cajas</th>\n<th colspan='11'>Temperaturas</th>\n";
            foreach($temperaturas as $caja => $valores) {
                echo "<tr>\n";
                    echo "<th>$caja</th>\n";
                    foreach($valores as $numero) {
                        echo "<td>$numero</td>\n";
                    }
                echo "</tr>\n";
            }
        echo "</table>\n";
        echo "</div>\n";
        echo "<div class='center'>\n";
        echo "<p>Las cajas con temperaturas superiores a 4º son: \n";
        foreach($temperaturas as $caja => $valores){
            foreach($valores as $numero){
                if($numero > 4){
                    echo $caja . ", ";
                    break;
                }
            }
        }
        echo "</p>\n";
        echo "</div>\n";
    ?>
</body>
</html>