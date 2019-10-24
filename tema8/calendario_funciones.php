<?php
    
    function calendario_anual($anio) {
        $mes = 1;
        echo <<<AAA
        <div class='center'>
        <table>
AAA;
            for($i = 0; $i < 3; $i++) {
                echo "<tr>";
                for($j = 0; $j < 4; $j++) {
                    echo "<td>";
                    calendario_mensual($anio, $mes);
                    echo "</td>";
                    $mes++;
                }
                echo "</tr>";
            }
        echo <<<AAA
        </table>
        </div>
AAA;
    }

    function calendario_mensual($anio, $mes) {
        $meses = ["Enero" => 1, "Febrero" => 2, "Marzo" => 3, "Abril" => 4, "Mayo" => 5, 
        "Junio" => 6,  "Julio" => 7,  "Agosto" => 8,  "Septiembre" => 9,  "Octubre" => 10,
        "Noviembre" => 11, "Diciembre" => 12];
        $dias_semana = ["L", "M", "X", "J", "V", "S", "D"];
        
        echo "año: " . $mes . "mes:" . $mes;
        echo <<<AAA
        <div class="center">
            <table>
                <tr>
                    <td>$mes</td>
                </tr>
                <tr>
                //Un td por cada día de la semana
                </tr>
            </table>
        </div>
AAA;
    }

    function pintar_form($exercise, $css) {
        pintar_cabecera_html($exercise, $css);
        echo "<body>";
        pintar_button_return_exercises_html();
        echo <<<AAA
        <div class="center">
            <form action="" method="post" class="form_border">
                <div class="center">
                    <label for="">Día</label>
                    <input type="text" name="dia">
                    <label for="">Mes</label>
                    <input type="text" name="mes">
                    <label for="">Año</label>
                    <input type="text" name="anio">
                </div>
AAA;
            paint_button_submit();
            echo <<<AAA
            </form>
        </div>
        </body>
        </html>
AAA;
    }
?>