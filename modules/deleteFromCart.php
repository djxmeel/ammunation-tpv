<?php
    session_start();

    $id = $_POST["id"];
    $index = array_search($id, $_SESSION["actual"]["id"]);

    if($index !== false){
        unset($_SESSION["actual"]["id"][$index],
                $_SESSION["actual"]["quantity"][$index],
                    $_SESSION["actual"]["subtotal"][$index]);

        $_SESSION["actual"]["id"] = array_values($_SESSION["actual"]["id"]);
        $_SESSION["actual"]["quantity"] = array_values($_SESSION["actual"]["quantity"]);
        $_SESSION["actual"]["subtotal"] = array_values($_SESSION["actual"]["subtotal"]);
    }
?>