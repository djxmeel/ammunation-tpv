
<title>AMMUNATION: Product details</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Edit product data <i class="bx bxs-star"></i></h1>
    <section class="product-details">
            <?php
                if(isset($_GET["dni"])){

                    $_GET["dni"] = $con->real_escape_string($_GET["dni"]);
                    
                    echo "<form method='POST' action='customer_edit_process.php?dni=".$_GET['dni']."'>
                            <table>";

                    $query = "SELECT * FROM clientes WHERE dni='". $_GET["dni"] . "'";
    
                    $result = $con->query($query);
    
                    while($row = $result->fetch_assoc()){
                        echo
                            "<tr>
                            <th><h2>DNI: </h2></th>
                                <td><input name='c_dni' type='text' value='".$row["dni"]."'/></td>
                            </tr>
                            <tr>
                                <th><h2>Name: </h2></th>
                                <td><input name='c_name' type='text' value='".$row["nombre"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Last name 1: </h2></td>
                                <td><input name='c_last1' type='text' value='".$row["apellido1"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Last name 2: </h2></td>
                                <td><input name='c_last2' type='text' value='".$row["apellido2"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Address: </h2></td>
                                <td><input name='c_address' type='textarea' value='".$row["direccion"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Contacto: </h2></td>
                                <td><input name='c_contact' type='text' value='".$row["contacto"]."'/></td>
                            </tr>
                            <tr>
                                <td><a href='customer_list.php'><input class='links' type='button' value='<< Back'></a></td>
                                <td><input name='confirm_c_edit' class='links' type='submit' value='Confirm'></td>
                            </tr>
                        </table>
                    </form>";
                    } 
                } else {
            ?>
            <form method='POST' action='customer_edit_process.php'>
                <table>
                    <tr>
                        <th><h2>DNI: </h2></th>
                        <td><input name='c_dni' type='text'/></td>
                    </tr>
                    <tr>
                        <th><h2>Name: </h2></th>
                        <td><input name='c_name' type='text'/></td>
                    </tr>
                    <tr>
                        <td><h2>Last name 1: </h2></td>
                        <td><input name='c_last1' type='text'/></td>
                    </tr>
                    <tr>
                        <td><h2>Last name 2: </h2></td>
                        <td><input name='c_last2' type='text'/></td>
                    </tr>
                    <tr>
                        <td><h2>Address: </h2></td>
                        <td><input name='c_address' type='textarea'/></td>
                    </tr>
                    <tr>
                        <td><h2>Contacto: </h2></td>
                        <td><input name='c_contact' type='text'/></td>
                    </tr>
                    <tr>
                        <td><h2>Register date: </h2></td>
                        <td><input name='c_date' type='date'/></td>
                    </tr>
                    <tr>
                        <td><a href='customer_list.php'><input class='links' type='button' value='<< Back'></a></td>
                        <td><input name='confirm_c_add' class='links' type='submit' value='Confirm'></td>
                    </tr>
                </table>
            </form>
            <?php }?>
    </section>
</main>
</body>
</html>