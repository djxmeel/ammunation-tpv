<?php
    if(session_status() == PHP_SESSION_NONE) session_start();
    unset($_SESSION["actual"]);
    $_SESSION["total"] = 0;
    
    include("../modules/refreshCart.php")
?>