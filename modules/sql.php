<?php
    $hostname="localhost";
    $db_username="root";
    $db_password="";
    $database="ammunation";

    $con = new mysqli($hostname, $db_username, $db_password, $database);

    if($con->connect_error){
        die("Database not connected : " + $con->connect_error);
    }
?>