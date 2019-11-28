<?php
    session_name("ejemplo1");
    session_start();
    $_SESSION["nombre"] = "2DAW";
    print "<p>El nombre es $_SESSION[nombre]</p>";

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
?>