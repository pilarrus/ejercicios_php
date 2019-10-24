<?php
    date_default_timezone_set('Europe/Madrid');
    require("../php/funciones_de_pintar.php");
    $css = ["base", "buttons", "tables", "positions", "style"];
    
    pintar_cabecera_html('Ejercicio 1', $css);
    echo "<body>";
    pintar_button_return_exercises_html();
?>
    <div class="center">
        <table>
            <tr>
                <th>Fecha de hoy</th>
                <td><?php pintar_fecha_de_hoy() ?></td>
            </tr>
            <tr>
                <th>Fecha de mañana</th>
                <td><?php pintar_fecha_de_mañana() ?></td>
            </tr>
            <tr>
                <th>Hora de ahora</th>
                <td><?php pintar_hora_de_ahora() ?></td>
            </tr>
            <tr>
                <th>Fecha del lunes</th>
                <td><?php pintar_fecha_del_lunes() ?></td>
            </tr>
        </table>
    </div>
</body>
</html>

<?php
    function pintar_fecha_de_hoy() {
        echo date("d-m-Y");
    }

    function pintar_fecha_de_mañana() {
        echo date("d")+1 . "-" . date("m") . "-" . date("Y");
    }
    function pintar_hora_de_ahora() {
        echo date("H:i:s");
    }
    function pintar_fecha_del_lunes() {
        $hoy = date("D");
        $dias_semana = ["Tue" => 6, "Wed" => 5, "Thu" => 4, "Fri" => 3, "Sat" => 2, "Sun" => 1, "Mon" => 0];
        foreach($dias_semana as $dia => $value) {
            if($hoy === $dia) {
                echo date("d") + $value . date("-m-Y");
            }
        }
    }
?>