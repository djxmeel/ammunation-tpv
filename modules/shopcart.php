<?php 
    require_once("sql.php");

    if(session_status() == PHP_SESSION_NONE) session_start();

    if(!isset($_SESSION["actual"])){
        $_SESSION["actual"] = array(
            "id" => array(),
            "quantity" => array(),
            "subtotal" => array() 
        );
    }

    if(!isset($_SESSION["client"])){
        $_SESSION["client"] = "GENERIC";
    }

    $index = array_search($_POST["id"], $_SESSION["actual"]["id"]);

    if($index !== false){
        $_SESSION["actual"]["quantity"][$index]++;
    }    
    else {
        array_push($_SESSION["actual"]["id"], $_POST["id"]);
        array_push($_SESSION["actual"]["quantity"], 1);
    } 
?>

<tr>
<th colspan="3" class="cart"><input class="links" onclick="clearBtn()" id="clearbtn" type="button" value="Clear Cart"> ID Compra</th>
    <td colspan="2" class="cart">
        ID cliente
        <select name="clientes" id="clientes" onchange="switchClient(this.value)">
        <?php
            $query = "SELECT dni FROM clientes";

            $result = $con->query($query);

            while($row = $result->fetch_assoc()) {
                if($row["dni"] == $_SESSION["client"])
                echo "<option selected value='".$row["dni"]."'>".$row["dni"]."</option>";
                else
                    echo "<option value='".$row["dni"]."'>".$row["dni"]."</option>";
            }
        ?>
        </select>
    </td>
</tr>
<tr>
    <th class="th-small">Delete</th>
    <th>Product</th>
    <th class="th-small">Quantity</th>
    <th class="th-small">Unit</th>
    <th class="th-small">Sub.</th>
</tr>
<?php
    $indexSession = 0;
    
    foreach ($_SESSION["actual"]["id"] as $elementId) {
        $query = "SELECT * FROM productos WHERE id=".$elementId;

        $result = $con->query($query);

        while($row = $result->fetch_assoc()) {

            $subtotal = $row["precio"]*$_SESSION["actual"]["quantity"][$indexSession];


            $_SESSION["actual"]["subtotal"][$indexSession] = $subtotal;

            echo "
            <tr>
                <td class='td-small'><button id='".$elementId."' onclick='deleteFromCart(this.id)'><i class='bx bx-x'></i></button></td>
                <td>".$row["nombre"]."</td>
                <td class='td-small'>".$_SESSION["actual"]["quantity"][$indexSession]."</td>
                <td class='td-small'>".$row["precio"]."</td>
                <td class='td-small'>".$_SESSION["actual"]["subtotal"][$indexSession]."</td>
            </tr>";
        }
        
        $indexSession++;
    }
?>
<?php
    $_SESSION["total"] = 0;

    for ($i=0; $i < sizeof($_SESSION["actual"]["subtotal"]) ; $i++) { 
        $_SESSION["total"] += $_SESSION["actual"]["subtotal"][$i];
    }
?>