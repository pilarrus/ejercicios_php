<?php
    require("../php/funciones.php");
    require("../php/funciones_de_pintar.php");
    require("calendario_funciones.php");
    $css = ["base", "buttons", "forms", "tables", "positions", "style"];
    
    pintar_form("Ejercicio 2", $css);

    if(isset($_POST['submit'])) {
        //print_r($_POST);
        $mes = controla_entrada($_POST['mes']);
        //echo $mes;
        $anio = controla_entrada($_POST['anio']);
        //echo $anio;
        if(existe_mes_y_anio($mes, $anio)) {
            //echo "Llamar a calendario_mensual()";
            calendario_mensual($anio, $mes);
        } else if(existe_mes($mes)){
            $anio = date('Y');
            //echo "Llamar a calendario_mensual() con el año en el que estamos";
            calendario_mensual($anio, $mes);
        } else if(existe_anio($anio)){
            //echo "Llamar a calendario_anual()";
            calendario_anual($anio);
        } else {
            $anio = date("Y");
            //echo "Llamar a calendario_anual() con el año en el que estamos";
            calendario_anual($anio);
        }
        //echo $anio;
        //calendario_anual($anio);
    }

    function existe_mes_y_anio($mes, $anio) {
        if(!empty($mes) && is_numeric($mes)) {
            if(existe_anio($anio)) {
                return true;
            }
        } else {
            return false;
        }
    }

    function existe_anio($anio) {
        if(!empty($anio) && is_numeric($anio)) {
            return true;
        }
        return false;
    }

    function existe_mes($mes) {
        if(is_numeric($mes)) {
            return true;
        }
    }

?>
