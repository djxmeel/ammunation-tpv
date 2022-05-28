<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Refunds</title>
<main class="home_content">
    <h1>Saved carts <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>Employee</th>
                <th>DNI</th>
                <th>Date</th>
                <th>Total</th>
                <th>Load</th>
            </tr>
            <?php

                $query = "SELECT * FROM compras WHERE aparcada=1";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td class='category-options'>".$row["id_empleado"]."</td>
                        <td class ='category-options'>". $row["dni_cliente"]."</td>
                        <td class='category-options'>".$row["fecha"]."</td>
                        <td class='category-options'>".$row["importe"]."</td>
                        <td><i id='".$row["id"]."' onclick='loadcart(this.id)' class='bx bx-down-arrow-alt list'></i></td>
                    </tr>";
                } 
            ?>
        </table>
    </section>
    <script>
        function loadcart(id){
            $.ajax({
                url: "loadcartprocess.php",
                type: "POST",
                data: {"id": id},
                success: function() {
                    location.reload();
                }
            });
        }
    </script>
</main>
</body>
</html>