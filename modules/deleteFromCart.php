<?php
    session_start();

    $id = $_POST["id_delete"];
    $index = array_search($id, $_SESSION["actual"]["id"]);

    if($index !== false){
        $actualId = array_values($_SESSION["actual"]["id"]);
        $actualQuant = array_values($_SESSION["actual"]["quantity"]);
        $actualSub = array_values($_SESSION["actual"]["subtotal"]);

        unset($actualId[$index],
                $actualQuant[$index],
                    $actualSub[$index]);

        $_SESSION["actual"]["id"] = array_values($actualId);
        $_SESSION["actual"]["quantity"] = array_values($actualQuant);
        $_SESSION["actual"]["subtotal"] = array_values($actualSub);
    }
?>
