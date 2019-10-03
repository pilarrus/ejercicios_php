<?php
    require("../../php/funciones.php");

    if(isset($_POST['submit'])) {
        /*Solo tiene style, base, buttons*/
        registro();
    } else {
        //header("Location: ../html/registro.html");
        pintar_formulario_registro('Ejercicio 3');
    }
?>

</body>
</html>