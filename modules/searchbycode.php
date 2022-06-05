<?php
    include_once("sql.php");
?>
<tr>
    <th class="th-small">Image</th>
    <th>Name</th>
    <th>Code</th>
    <th class="th-small">Stock</th>
    <th class="th-small">Add</th>
</tr>
<?php 
    if(isset($_GET["code"])){
            $code = $con->real_escape_string($_GET["code"]);

            $query = "SELECT * FROM productos WHERE code LIKE '". $code ."%'";

            $result = $con->query($query);

        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td class='td-small product-row'><img src='../img/guns/".$row["img"]."'></td>
                    <td class='product-row'>".$row["nombre"]."</td>
                    <td class='product-row'>".$row["code"]."</td>";

                    if($row["stock"] > 0) echo "<td class='td-small product-row'><i class='bx bx-check'></i></td>";
                    else echo "<td class='td-small product-row'><i class='bx bx-x'></i></td>";
            
            echo    "<td class='td-small product-row'><button id='".$row["id"]."' onclick='shopcart(this.id)'><i class='bx bx-plus-circle'></i></button></td>
                </tr>";
        }
    }
?>