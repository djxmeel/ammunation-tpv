<?php
    if(session_status() == PHP_SESSION_NONE) session_start();

    $input = $_GET["inp"];
    $total = $_SESSION["total"];

    if($input - $total < 0)
        echo "You need ". $total-$input ." dollars more.";
    else
        echo "Change: ". $input - $total;

?>