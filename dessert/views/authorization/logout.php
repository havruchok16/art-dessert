<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();

    session_destroy();
    header("Location: http://dessert/index.php");
    http_response_code(301);
?>