<?php
    
    function calendario_anual($anio) {
        $mes = 1;
        echo <<<AAA
        <div class='center'>
        <table>
        <tr><td colspan="4">$anio</td></tr>
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
        //setlocale(LC_ALL, 'es_ES');
        $meses = [1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo",
        6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre",
        11 => "Noviembre", 12 => "Diciembre"];
        $dias_semana = ["Mon" => "L", "Tue" => "M", "Wed" => "X", "Thu" => "J", "Fri" => "V", "Sat" => "S", "Sun" => "D"];
        
        $dia_comienzo = new DateTime("$mes/1/$anio");
        echo $dia_comienzo->format('D-d-m-Y') . "<br>";
        //echo $dia_comienzo->format('d');
        
        $dia_fin_str = new DateTime("$mes/1/$anio");
        $dia_fin_str->modify('last day of this month');
        echo $dia_fin_str->format('d');
        //echo $dia_fin->format('D-d-m-Y');

        echo <<<AAA
        <div class="center">
            <table>
                <tr>
                    <td colspan="7">$meses[$mes]</td>
                </tr>
                <tr>
AAA;
                    foreach ($dias_semana as $key => $value) {
                        echo "<td>$value</td>";
                    }
                echo <<<AAA
                </tr>
AAA;
                /*$dia_fin = intval($dia_fin_str->format('d'));
                for($i = 1; $i <= $dia_fin; $i++) {
                    echo "<td></td>";
                }*/
            echo <<<AAA
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