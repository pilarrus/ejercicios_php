<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verbos irregulares</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/positions.css">
</head>
<body>
    <button class="return_exercises">
        <a href="../index.php">Volver a Ejercicios</a>
    </button>
    <h2>VERBOS IRREGULARES</h2>
    <div class="row">
        <?php
            
            $palabras["despertar"] = array("awake", "awoke", "awoken");
            $palabras["morder"] = array("bite", "bit", "bitten");
            $palabras["sangrar"] = array("bleed", "bled", "bled");
            $palabras["construir"] = array("build", "built", "built");
            $palabras["quemar"] = array("burn", "burnt", "burnt");
            $palabras["comprar"] = array("buy", "bought", "bought");
            $palabras["tirar"] = array("cast", "cast", "cast");
            $palabras["elegir"] = array("choose", "chose", "chosen");
            $palabras["venir"] = array("come", "came", "come");
            $palabras["costar"] = array("cost", "cost", "cost");

            $esp;
            
            if (isset($_POST['submit'])) {
                //Si ha pasado por el formulario.
                //Habrá tres contadores: aciertos, fallos y preguntas_hechas.
                //Cada vez que entre por aquí sumo uno a preguntas_hechas.
                //Compruebo si está bien o mal y dependiendo de la respuesta sumo uno a aciertos o a fallos.
                /*$aciertos = 0;
                $fallos = 0;
                $preguntas_hechas = 0;

                $infinitivo = (isset($_POST["infinitivo"])) ? trim(strip_tags($_REQUEST["infinitivo"])) : "";
                $pasado = (isset($_POST["pasado"])) ? trim(strip_tags($_REQUEST["pasado"])) : "";
                $participio = (isset($_POST["participio"])) ? trim(strip_tags($_REQUEST["participio"])) : "";

                ($infinitivo == $palabras[$esp][0]) ? $aciertos++ : $fallos++;

                if($pasado == $palabras[$esp][1]){
                    $aciertos++;
                } else {
                    $fallos++;
                }

                if($participio == $palabras[$esp][2]){
                    $aciertos++;
                } else {
                    $fallos++;
                }

                $preguntas_hechas++;
                
                echo $preguntas_hechas;
                echo $aciertos;
                echo $fallos;
                */
            } else {
                //Si no ha pasado por el formulario.
                //Que muestre una palabra en español y los tres campos que tiene que rellenar.
                //Después que de a siguiente para que compruebe las respuestas y devuelva otra palabra.
                //Así hasta que haya pasado por todas las palabras que contiene el array.
                //Cuando finalice que le muestre la puntuación obtenida.

                foreach($palabras as $clave => $valores) {
                    echo "<p>$clave</p>\n";
                    $esp = $clave;
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label>Infinitivo</label>
            <input type="text" id="" name="infinitivo" method="post"/>
            <label>Pasado</label>
            <input type="text" id="" name="pasado" method="post"/>
            <label>Participio</label>
            <input type="text" id="" name="participio" method="post"/>
            
        <?php
                }
            }
        ?>
        <div class="center">
            <button type="submit" name="submit" class="submit">Enviar</button>
        </div>
        </form>
    </div>
</body>
</html>