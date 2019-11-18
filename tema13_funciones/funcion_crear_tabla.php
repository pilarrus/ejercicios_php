<?php
    function crear_tabla($num_filas, $num_columnas, ...$args) {
        $width = $args[0];
        $heigth = $args[1];
        $backgroud = $args[2];
        $border = $args[3];

        echo "<table style=\"$width $heigth $backgroud $border\">";
        for($i = 0; $i < $num_filas; $i++) {
            echo "<tr>";
            for($j = 0; $j < $num_columnas; $j++) {
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

?>