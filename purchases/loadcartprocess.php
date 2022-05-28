<?php
    session_start();
    require_once("../modules/sql.php");

    $id = $_POST["id"];

    $query = "SELECT * FROM detalles_compra WHERE id_compra=".$id;

    $result = $con->query($query);

    $index = 0;

    unset($_SESSION["actual"]);

    if(!isset($_SESSION["actual"])){
        $_SESSION["actual"] = array(
            "id" => array(),
            "quantity" => array(),
            "subtotal" => array() 
        );
    }

    while($row = $result->fetch_assoc()){
        $_SESSION["actual"]["id"][$index] = $row["id_producto"];
        $_SESSION["actual"]["quantity"][$index] = $row["cantidad"];
        $_SESSION["actual"]["subtotal"][$index] = $row["precio_venta"] * $row["cantidad"];
        $index++;
    }
    
    $query = "SELECT dni_cliente FROM compras WHERE id=".$id;

    while($row = $result->fetch_assoc()){
        $_SESSION["client"] = $row["dni_cliente"];
    }

    $query = "DELETE FROM compras WHERE id=".$id;

    $con->query($query);

    $query = "DELETE FROM detalles_compra WHERE id_compra=".$id;

    $con->query($query);
?>