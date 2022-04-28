
<title>WELCOME TO AMMUNATION</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Product Details <i class="bx bxs-star"></i></h1>
    <section class="product-details">
        <table>
        <?php
                $_GET["dni"] = $con->real_escape_string($_GET["dni"]);

                $query = "SELECT * FROM clientes WHERE dni='". $_GET["dni"] ."'";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo 
                        "<tr>
                            <th colspan='2'><h1>Customer ".$row["dni"]."</h1></th>
                        </tr>
                        <tr>
                            <td><h2>Full Name : </h2></td>
                            <td>". $row["nombre"] ." ". $row["apellido1"] ." ". $row["apellido2"] ."</td>
                        </tr>
                        <tr>
                            <td><h2>Address : </h2></td>
                            <td>".$row["direccion"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Contact : </h2></td>
                            <td>".$row["contacto"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Register date : </h2></td>
                            <td>".$row["fecha_alta"]."</td>
                        </tr>
                        <tr>
                            <td><a class='links' href='customer_list.php'><input type='button' value='<< Back'></a></td>
                            <td><a class='links' href='customer_list_update.php?dni=".$row["dni"]."'><input type='button' value='Edit'></a></td>
                        </tr>";
                } 
            ?>
        </table>
    </section>
</main>
</body>
</html>