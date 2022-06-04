<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Sales of the day</title>
<main class="home_content">
    <h1>Sales of the day <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table class="padcolumns">
            <tr>
                <th>Employee</th>
                <th>DNI</th>
                <th>Date</th>
                <th>Total</th>
            </tr>
            <?php
                $today = date("Y-m-d");
                $query = "SELECT * FROM compras WHERE fecha='".$today."'";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr class=''>
                        <td class='category-options'>".$row["id_empleado"]."</td>
                        <td class ='category-options'>". $row["dni_cliente"]."</td>
                        <td class='category-options'>".$row["fecha"]."</td>
                        <td class='category-options'>".$row["importe"]."</td>
                    </tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access in">
            <input class="links" id='logout' type="button" value="Logout">
    </section>
</main>
<script>
    $("#logout").click(function(){
        window.location.replace("../index/index.php?logout=1");
    })
</script>
</body>
</html>