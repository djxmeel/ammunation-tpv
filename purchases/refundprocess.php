<?php  require_once("../modules/sql.php"); ?>
<tr>
    <th>Employee</th>
    <th>DNI</th>
    <th>Date</th>
    <th>Total</th>
    <th>Refund</th>
</tr>
<?php
   
    $id = $_POST["id"];

    $query = "DELETE FROM compras WHERE id=".$id;
    $con->query($query);
    
    $query = "DELETE FROM detalles_compras WHERE id_compra=".$id;
    $con->query($query);

    $query = "SELECT * FROM compras WHERE estado=1";

    $result = $con->query($query);

    while($row = $result->fetch_assoc()){
        echo "
        <tr>
            <td class='category-options'>".$row["id_empleado"]."</td>
            <td class ='category-options'>". $row["dni_cliente"]."</td>
            <td class='category-options'>".$row["fecha"]."</td>
            <td class='category-options'>".$row["importe"]."</td>
            <td><i id='".$row["id"]."' onclick='refund(this.id)' class='bx bx-money-withdraw list'></i></td>
        </tr>";
    } 
?>
