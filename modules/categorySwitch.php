<?php
    include_once("sql.php");
?>
<tr>
    <th colspan="3">
        Search :
        <input type="text" name="productcode" id="productcode" placeholder="Code">
    </th>
</tr>
<tr>
    <th class="th-small"></th>
    <th>Name</th>
    <th class="th-small">Stock</th>
    <th class="th-small">Add</th>
</tr>
<?php 
    if(isset($_GET["cat"])){
        if($_GET["cat"] == 0){
            $query = "SELECT * FROM productos"; // all categories option
        } else {
            $cat = $con->real_escape_string($_GET["cat"]);

            $query = "SELECT * FROM productos WHERE id_categoria=". $cat;
        }

            $result = $con->query($query);

        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td class='td-small'><img src='../img/guns/".$row["img"]."'></td>
                    <td>".$row["nombre"]."</td>";

                    if($row["stock"] > 0) echo "<td class='td-small'><i class='bx bx-check'></i></td>";
                    else echo "<td class='td-small'><i class='bx bx-x'></i></td>";
            
            echo    "<td class='td-small'><button id='".$row["id"]."' onclick='shopcart(this.id)'><i class='bx bx-plus-circle'></i></button></td>
                </tr>";
        }
    }
?>