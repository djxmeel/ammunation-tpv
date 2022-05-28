<?php
    session_start();
    unset($_SESSION["loggedAs"]);
    unset($_GET["logout"]);

    header("Location: login.php?to=".$_GET["id"]);
?>