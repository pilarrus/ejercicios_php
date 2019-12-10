<?php
session_start();

require("../../php/funciones_genericas_pintar.php");
require("./funciones.php");

$css = ["base", "buttons", "forms", "positions", "style"];
$campos = ["usuario", "email", "contrasenia", "nombre", "primer_apellido", "segundo_apellido", "sexo", "titulaciones", "idiomas"];
$sexo = ["Mujer" => "mujer", "Hombre" => "hombre", "NS/NC" => "ns/nc"];
$titulaciones = ["E.S.O." => "eso", "Bachillerato" => "bachillerato", "Grado medio" => "grado_medio", "Grado superior" => "grado_superior"];
$idiomas = ["Inglés" => "ingles", "Francés" => "frances", "Español" => "espaniol"];
$errores = ["error_usuario", "error_email", "error_contrasenia", "error_nombre", "error_primer_apellido", "error_segundo_apellido", "error_sexo", "error_titulaciones", "error_idiomas"];

establecer_variables_session($campos);

if(isset($_POST['submit'])) {
    $usuarios_registrados = obtener_usuarios_registrados();
    $validar_usuario = true;
    foreach ($usuarios_registrados as $usuario_registrado) {
        if(!validar_usuario($_SESSION['usuario'], $usuario_registrado)) {
            $validar_usuario = false;
            break;
        } 
    }

    validar_email($_SESSION['email']);
    validar_contrasenia($_SESSION['contrasenia']);
    validar_cadena($_SESSION['nombre'], "nombre", "error_nombre");
    validar_cadena($_SESSION['primer_apellido'], "primer apellido", "error_primer_apellido");
    validar_cadena($_SESSION['segundo_apellido'], "segundo apellido", "error_segundo_apellido");
    validar_sexo($_SESSION['sexo']);
    validar_titulaciones($_SESSION['titulaciones']);
    validar_idiomas($_SESSION['idiomas']);

    $contador_errores = 0;
    foreach ($errores as $error) {
        if(isset($_SESSION[$error])) {
            $contador_errores++;
        }
    }
    if(!$contador_errores) {
        header('Location: ./pagina_bienvenida.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <?php pintar_links_css("../..", $css); ?>
</head>
<body>
    <?php pintar_button_volver_a_ejercicios("../.."); ?>
    <div class="center">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
            <fieldset>
                <legend>Datos de acceso</legend>
                
                <label for="">Usuario</label>
                <input type="text" name="usuario" value="<?php echo $_SESSION['usuario']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_usuario'])) {
                    echo $_SESSION['error_usuario'] . "<br/>";
                    unset($_SESSION['error_usuario']);
                } ?>
                
                <label for="">E-mail</label>
                <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_email'])) {
                    echo $_SESSION['error_email'] . "<br/>";
                    unset($_SESSION['error_email']);
                } ?>

                <label for="">Contraseña</label>
                <input type="password" name="contrasenia" value="<?php echo $_SESSION['contrasenia']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_contrasenia'])) {
                    echo $_SESSION['error_contrasenia'] . "<br/>";
                    unset($_SESSION['error_contrasenia']);
                } ?>
            </fieldset>

            <fieldset>
                <legend>Datos personales</legend>

                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $_SESSION['nombre']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_nombre'])) {
                    echo $_SESSION['error_nombre'] . "<br/>";
                    unset($_SESSION['error_nombre']);
                } ?>

                <label for="">Primer apellido</label>
                <input type="text" name="primer_apellido" value="<?php echo $_SESSION['primer_apellido']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_primer_apellido'])) {
                    echo $_SESSION['error_primer_apellido'] . "<br/>";
                    unset($_SESSION['error_primer_apellido']);
                } ?>

                <label for="">Segundo apellido</label>
                <input type="text" name="segundo_apellido" value="<?php echo $_SESSION['segundo_apellido']; ?>"><br/>
                <?php
                if(isset($_SESSION['error_segundo_apellido'])) {
                    echo $_SESSION['error_segundo_apellido'] . "<br/>";
                    unset($_SESSION['error_segundo_apellido']);
                } ?>

                <label for="">Sexo</label>
                <?php
                foreach ($sexo as $label => $name) {
                    if($_SESSION['sexo'] === $name) {
                        echo "<input type=\"radio\" name=\"sexo\" value=\"$name\" checked />$label";
                    } else {
                        echo "<input type=\"radio\" name=\"sexo\" value=\"$name\" />$label";
                    }
                }
                echo "<br/>";

                if(isset($_SESSION['error_sexo'])) {
                    echo $_SESSION['error_sexo'] . "<br/>";
                    unset($_SESSION['error_sexo']);
                }
                ?>
                
            </fieldset>

            <fieldset>
                <legend>Datos académicos</legend>

                <label for="">Titulaciones</label>
                <select name="titulaciones[]" id="" multiple>
                    <?php
                    if(is_string($_SESSION['titulaciones'])) {
                        foreach ($titulaciones as $label => $value) {
                            echo "<option value=\"$value\">$label</option>";
                        }
                    } else {
                        $i = 0;
                        foreach($titulaciones as $label => $value) {
                            if($i < count($_SESSION['titulaciones']) && $_SESSION['titulaciones'][$i] == $value) {
                                echo "<option value=\"$value\" selected>$label</option>";
                                $i++;
                            } else {
                                echo "<option value=\"$value\">$label</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <?php
                if(isset($_SESSION['error_titulaciones'])) {
                    echo $_SESSION['error_titulaciones'] . "<br/>";
                    unset($_SESSION['error_titulaciones']);
                } ?>

                <br/>
                <label for="">Idiomas</label>
                <?php
                if(is_string($_SESSION['idiomas'])) {
                    foreach ($idiomas as $label => $value) {
                        echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$value\" />$label";
                    }
                } else {
                    $i = 0;
                    foreach ($idiomas as $label => $value) {
                        if($i < count($_SESSION['idiomas']) && $_SESSION['idiomas'][$i] == $value) {
                            echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$value\" checked />$label";
                            $i++;
                        } else {
                            echo "<input type=\"checkbox\" name=\"idiomas[]\" value=\"$value\" />$label";
                        }
                    }
                }

                if(isset($_SESSION['error_idiomas'])) {
                    echo $_SESSION['error_idiomas'] . "<br/>";
                    unset($_SESSION['error_idiomas']);
                }
                ?>
            </fieldset>

            <div class='center'>
                <input type="submit" value="Enviar" name="submit" class="submit2">
            </div>
        </form>
    </div>
</body>
</html>