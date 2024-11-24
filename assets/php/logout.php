<?php

    session_start();
    session_unset();
    session_destroy();
    $_SESSION = array();
    // Destruir la sesión
    
    header("Location: http://localhost/PROYECTO");
    exit();

?>