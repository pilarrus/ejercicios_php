<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 5 - Pilar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <button>
        <a href="../../index.php">Volver a Ejercicios</a>
    </button>
<?php
    if(isset($_POST['submit'])) {
        if(isset($_POST['aristoteles'])) {
            $aristoteles = trim($_POST['aristoteles']);
            $aristoteles = strip_tags($aristoteles);
            $aristoteles = htmlentities($aristoteles);
            $aristoteles = htmlspecialchars($aristoteles);
        }
        //var_dump($aristoteles);
        echo $aristoteles;
        
        if(isset($_POST['cervantes'])) {
            $cervantes = trim($_POST['cervantes']);
            $cervantes = strip_tags($cervantes);
            $cervantes = htmlentities($cervantes);
            $cervantes = htmlspecialchars($cervantes);
        }
        //var_dump($cervantes);
        echo $cervantes;
    } else {
        header("Location: ../html/ejercicio4.html");
    }
?>

</body>
</html>