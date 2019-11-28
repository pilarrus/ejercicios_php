<?php
session_name("ejemplo1");
session_name("ejemplo2");
session_start();
print "<p>El nombre es $_SESSION[nombre]</p>";

// Si no se ve es porque la cookie y la sesión están destruidas
?>