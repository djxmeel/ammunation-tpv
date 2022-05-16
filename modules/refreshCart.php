<tr>
    <th colspan="3" class="cart"><input class="links" onclick="clearBtn()" id="clearbtn" type="button" value="Clear Cart"> ID Compra</th>
    <td colspan="2" class="cart">
        ID cliente
        <select name="clientes" id="clientes">
            <option value="1">1</option>
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
    if(isset($_SESSION["actual"])){
        $indexSession = 0;
        foreach ($_SESSION["actual"]["id"] as $elementId) {
            $query = "SELECT * FROM productos WHERE id=".$elementId;
    
            $result = $con->query($query);
    
            while($row = $result->fetch_assoc()) {

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
    } else {
        echo "<tr><td>shit aint set".$_SESSION["actual"]."</td></tr>";
    }
?>
<?php
    if(isset($_SESSION["actual"])){
        $_SESSION["total"] = 0;

        for ($i=0; $i < sizeof($_SESSION["actual"]["subtotal"]) ; $i++) { 
            $_SESSION["total"] += $_SESSION["actual"]["subtotal"][$i];
        }
    }
?>