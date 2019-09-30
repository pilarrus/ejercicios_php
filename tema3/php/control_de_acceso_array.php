<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2 - Pilar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <button>
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
</body>
</html>
<?php 
    $usuario = ["nombre" => "Pepe", "usuario" =>"Pepe", "password" => "Pepe123"];
    if(isset($_POST['submit'])) {
        if($_POST['usuario'] === $usuario['usuario'] && $_POST['password'] === $usuario['password']) {
            echo "<p>Bienvenid@ " . $usuario['nombre'] . "</p>\n";
        } else {
            echo "<p>Acceso no autorizado</p>\n";
        }
    } else {
        // Te redirige al html en el que se encuentra el formulario
        header("Location: ../html/control_de_acceso.html");
    }
?>