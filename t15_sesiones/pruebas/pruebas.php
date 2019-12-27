<?php
    // Permite establecer el nombre de la sesión (opcional)
    session_name("pilar");

    // Crear o abrir la sesión. No hacer echo antes.
    session_start();

    // ID se genera solo y se guarda en una cookie.
    // Por defecto el nombre de una sesión es el ID.
    $id = $_COOKIE['PHPSESSID'];
    echo $id . "<br>";

    // Crear variables de sesión
    $_SESSION['nombre'] = "Pilar";
    $_SESSION['apellidos'] = "Rus Izquierdo";
    $_SESSION['edad'] = 26;
    var_dump($_SESSION);
    echo "<br>";
    // En php.ini: session.save_handler = files (Para usar las funciones de sesiones de php)
    // Necesario solo cuando session.save_handler = user en php.ini
    //ini_set("session.save_handler", "files"); //Después session_star();

    // Destruye una variable especificada
    unset($_SESSION['apellidos']);
    var_dump($_SESSION);
    echo "<br>";

    // Destruir todas las variables de sesión.
    $_SESSION = array();

    // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
    // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    /* Destruye toda la información asociada con la sesión actual. No destruye ninguna de las
    variables globales asociadas con la sesión, ni destruye la cookie de sesión.
    Cierra la sesión*/
    session_destroy();
    
    //El servidor puede cerrar la sesión cuando ha pasado el tiempo indicado en segundos
    //En php.ini: session.gc_maxlifetime = 1440

    //echo $_SESSION['apellidos'];
    
    // Como la sesión anterior ha sido "borrada" puedo abrir otra sesión.
    session_name("juan");
    session_start();
    $_SESSION['nombre'] = "Juan";
    var_dump($_SESSION);
    echo "<br>";

    //session_destroy();
?>