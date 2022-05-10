<?php
    session_start();
    unset($_SESSION["actual"]);
    $_SESSION["total"] = 0;
    
    include("../modules/refreshCart.php")
?>