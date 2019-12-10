<?php
    session_start();
    require("../php/funciones_genericas_pintar.php");
    require("./funciones.php");
    $ruta = "..";
    $css = ["base", "buttons", "forms", "positions", "style"];
    //$url = "./registro_usuarios.php";

    function datos_academicos() {
        $idiomas = ["Inglés" => "ingles", "Francés" => "frances", "Español" => "espaniol"];
        $titulaciones = ["E.S.O." => "eso", "Bachillerato" => "bachillerato", "Grado medio" => "grado_medio", "Grado superior" => "grado_superior"];
        
        echo <<<AAA
        <fieldset>
            <legend>Datos académicos</legend>
AAA;
            pintar_label("Titulaciones");
            $session_titulaciones = $_SESSION['titulaciones'];

            if($session_titulaciones == "") {
                pintar_select("titulaciones[]", $titulaciones, true);
                echo "<br/>";
            } else {
                $i = 0;
                echo "<select name='titulaciones[]' multiple>";
                    foreach($titulaciones as $label => $value) {
                        if($i < count($session_titulaciones) && $session_titulaciones[$i] == $value) {
                            echo "<option value=\"$value\" selected>$label</option>";
                            $i++;
                        } else {
                            echo "<option value=\"$value\">$label</option>";
                        }
                    }
                echo "</select>";
                echo "<br/>";
            }
            
            pintar_label("Idiomas");
            $i = 0;
            $session_idiomas = $_SESSION['idiomas'];
            foreach ($idiomas as $label => $value) {
                if($i < count($session_idiomas) && $session_idiomas[$i] == $value) {
                    pintar_input("checkbox", "idiomas[]", $value, $label, "", true);
                    $i++;
                } else {
                    pintar_input("checkbox", "idiomas[]", $value, $label);
                }
            }

        echo <<<AAA
        </fieldset>
        <br/>
AAA;
    }

    $datos_academicos = 'datos_academicos';

    function info_personal() {
        $campos = ["Nombre" => "nombre", "Primer apellido" => "primer_apellido", "Segundo apellido" => "segundo_apellido"];
        $sexo = ["Mujer", "Hombre", "NS/NC"];
        echo <<<AAA
        <fieldset>
            <legend>Información Personal</legend>
AAA;
            foreach ($campos as $label => $name) {
                pintar_label($label);
                if(validar_cadena($_SESSION[$name])) {
                    pintar_input("text", $name, $_SESSION[$name]);
                    echo "<br/>";
                } else {
                    pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                    //echo "<br/>";
                    echo "<p>$_SESSION[error_cadena]</p><br/>";
                }
            }
            unset($_SESSION['error_cadena']);
            
            pintar_label("Sexo");
            echo "<br/>";
            foreach ($sexo as $key => $value) {
                ($_SESSION['sexo'] == $value)
                ? pintar_input("radio", "sexo", $_SESSION['sexo'], $value, "", true)
                : pintar_input("radio", "sexo", $value, $value, "rojo");
            }
            
            echo <<<AAA
        </fieldset>
AAA;
    }

    $info_personal = 'info_personal';

    function datos_de_acceso() {
        $campos = ["Usuario" => "usuario", "E-mail" => "email", "Contraseña" => "contrasenia"];
        $usuarios_registrados = obtener_usuarios_registrados();
        
        echo <<<AAA
        <fieldset>
            <legend>Datos de acceso</legend>
AAA;
            foreach ($campos as $label => $name) {
                pintar_label($label);
                switch($name) {
                    case 'usuario':
                        $resp = true;
                        foreach($usuarios_registrados as $usuario_registrado) {
                            if(!validar_usuario($_SESSION[$name], $usuario_registrado)) {
                                pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                                echo "<p>$_SESSION[error_usuario]</p><br/>";
                                $resp = false;
                            break;
                            }
                        }
                        if($resp) {
                            pintar_input("text", $name, $_SESSION[$name]);
                            echo "<br/>";
                        }
                        unset($_SESSION['error_usuario']);
                        break;

                    case 'email':
                        if(!validar_email($_SESSION[$name])) {
                            pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                            echo "<p>$_SESSION[error_email]</p><br/>";
                        } else {
                            pintar_input("text", $name, $_SESSION[$name]);
                            echo "<br/>";
                        }
                        unset($_SESSION['error_email']);
                        break;

                    case 'contrasenia':
                        if(!validar_contrasenia($_SESSION[$name])) {
                            pintar_input("text", $name, $_SESSION[$name], "", 'rojo');
                            echo "<p>$_SESSION[error_contrasenia]</p><br/>";
                        } else {
                            pintar_input("text", $name, $_SESSION[$name]);
                            echo "<br/>";
                        }
                        unset($_SESSION['error_contrasenia']);
                        break;
                }
            }
        echo "</fieldset>";
    }

    $datos_de_acceso = 'datos_de_acceso';

    function formulario($datos_de_acceso, $info_personal, $datos_academicos) {
        $url = "./registro_usuarios.php";
        echo <<<AAA
        <div class="center">
        <form action="$url" method="post">
AAA;
            $datos_de_acceso();
            $info_personal();
            $datos_academicos();
            echo "<div class='center'>";
                pintar_button_submit('submit', 'Enviar', 'submit2');
            echo <<<AAA
            </div>
        </form>
    </div>
AAA;
    }

    $formulario = 'formulario';

    function pintar_base_html($ruta, $css, $formulario) {
        pintar_cabecera_html($ruta, $css);
        echo "<body>";
            pintar_button_volver_a_ejercicios($ruta);
            $formulario('datos_de_acceso', 'info_personal', 'datos_academicos');
        echo <<<AAA
        </body>
        </html>
AAA;
    }

    pintar_base_html($ruta, $css, $formulario);