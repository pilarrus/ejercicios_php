<?php
    function crear_tabla($num_filas, $num_columnas, ...$args) {
        $width = $args[0];
        echo $width;
        echo "<table style=\"$width\">";
        for($i = 0; $i < $num_filas; $i++) {
            echo "<tr>";
            for($j = 0; $j < $num_columnas; $j++) {
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        var_dump($args);
        echo $args[0];
    }

?>