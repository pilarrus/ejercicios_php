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
    <link rel="stylesheet" href="../../css/positions.css">
    <link rel="stylesheet" href="../../css/tables.css">
</head>
<body>
    <button class="return_exercises">
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
    <h2>Ejercicio 1 con HEREDOC</h2>
    <div class="center">
    <?php 
        $temperaturas = array();
        $temperaturas['Caja_1'] = array(1,1,1,1,1,2,2,2,3,1,4);
        $temperaturas['Caja_2'] = array(1,3,2,2,3,3,4,4,1,1,1);
        $temperaturas['Caja_3'] = array(1,1,5,5,1,2,2,3,3,4,1);
        $temperaturas['Caja_4'] = array(1,5,1,1,1,1,1,2,2,2,3);
        $temperaturas['Caja_5'] = array(1,1,1,2,2,2,3,1,1,1,5);

        echo <<<EOD
        
        <table>\n
        <tr>\n<th>Cajas</th>\n<th colspan='11'>Temperaturas</th>\n
EOD;
            foreach($temperaturas as $caja => $valores) {
                echo <<<EOD
                <tr>\n
                    <th>$caja</th>\n
EOD;
                    foreach($valores as $numero) {
                        echo <<<EOD
                        <td>$numero</td>\n
EOD;
                    }
                echo <<<EOD
                </tr>\n
EOD;
            }
        echo <<<EOD
        </table>\n
        </div>\n
        <div class='center'>\n
        <p>Las cajas con temperaturas superiores a 4º son: \n
EOD;
        foreach($temperaturas as $caja => $valores){
            foreach($valores as $numero){
                if($numero > 4){
                    echo <<<EOD
                    $caja , 
EOD;
                    break;
                }
            }
        }
        echo <<<EOD
        </p>\n
        </div>\n
EOD;
    ?>
    </div>
    <h2 class="heredoc">Ejercicio 2 con HEREDOC</h2>
    <div class="center exercise2">
    
    <?php

        define("NUMTABLAS", 3);
        for($cont=1; $cont <= NUMTABLAS; $cont++){
            echo <<<EOD
            <table class='multiplicationTable'>\n
            <tr>\n
            <th>Tabla del $cont :</th>\n
            </tr>\n
EOD;
            for($i = 0; $i < 11; $i++){
                $valor = $i*$cont;
                echo <<<EOD
                <tr>\n
                <th>$i x $cont = $valor </th>\n
                </tr>\n
EOD;
            }
            echo <<<EOD
            </table>\n
EOD;
        }

    ?>
    </div>
    <p>NOWDOC no es capaz de interpretar las variables</p>
    
</body>
</html>