<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Refunds</title>
<main class="home_content">
    <h1>Refunds <i class="bx bxs-star"></i></h1>
    <section class="category-list big">
        <table class="padcolumns-big">
            <tr>
                <th>Employee</th>
                <th>DNI</th>
                <th>Date</th>
                <th>Total</th>
                <th>Refund</th>
            </tr>
            <?php

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
        </table>
    </section>
    <script>
        function refund(id){
            $.ajax({
                url: "refundprocess.php",
                type: "POST",
                data: {"id": id},
                success: function(htmlBlock) {
                    $("table").html(htmlBlock);
                }
            });
        }
    </script>
</main>
</body>
</html>