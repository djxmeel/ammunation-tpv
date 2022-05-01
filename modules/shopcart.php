<?php 
    require_once("sql.php");

    session_start();

    if(!isset($_SESSION["actual"])){
        $_SESSION["actual"] = array(
            "id" => array(),
            "quantity" => array(), 
        );
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
<th colspan="2" class="cart">ID Compra</th>
    <td colspan="2" class="cart">
        ID cliente
        <select name="clientes" id="clientes">
            <option value="1">1</option>
        </select>
    </td>
</tr>
<tr>
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
            echo "
            <tr>
                <td>".$row["nombre"]."</td>
                <td class='td-small'>".$_SESSION["actual"]["quantity"][$indexSession]."</td>
                <td class='td-small'>".$row["precio"]."</td>
                <td class='td-small'>".$row["precio"]*$_SESSION["actual"]["quantity"][$indexSession]."</td>
            </tr>";
        }
        
        $indexSession++;
    }
?>