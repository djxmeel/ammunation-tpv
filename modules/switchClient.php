<?php
    session_start();

    $dni = $_POST["dni"];

    if(isset($_SESSION["client"])){
        $_SESSION["client"] = $dni;
    }
?>