<?php
    require_once("sql.php");
    session_start();

    if(isset($_SESSION["actual"])){
        $total = 0;

        for ($i=0; $i < sizeof($_SESSION["actual"]["id"]) ; $i++) { 
            $query = "SELECT precio FROM productos WHERE id=".$_SESSION["actual"]["id"][$i];
            
            $result = $con->query($query);

            while($row = $result->fetch_assoc()){
                $total += $row["precio"] * $_SESSION["actual"]["quantity"][$i];
            }
        }
        echo "<h1>Total: ".$total."</h1>";
    } else {
        echo "<h1>Total: 0</h1>";
    }
?>