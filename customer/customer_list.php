<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Customers</title>
<main class="home_content">
    <h1>Customers <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th class="break-none">DNI</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Register date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                if(isset($_GET["deleteid"])){
                    $stmt= $con->prepare("DELETE FROM clientes WHERE dni=?");
                    $stmt->bind_param("s", $_GET["deleteid"]); // bind parameters (string)
                    $stmt->execute();
                    
                    unset($_GET["deleteid"]);
                }

                $query = "SELECT dni,nombre,apellido1,apellido2, direccion, contacto, fecha_alta FROM clientes";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td class='break-none'>". $row["dni"] ."</td>
                            <td class='category-options'>".$row["nombre"]."</td>
                            <td class ='category-options'>". $row["apellido1"]." ". $row["apellido2"] ."</td>
                            <td class='category-options'>".$row["direccion"]."</td>
                            <td class='category-options'>".$row["contacto"]."</td>
                            <td class='category-options'>".$row["fecha_alta"]."</td>
                            <td><a class='category-options edit' href='customer_list.php?dni=".$row["dni"]."'><i class='bx bx-edit-alt' ></i></a></td>
                            <td><a class='category-options delete' onClick=\"return confirm('Are you sure?')\" href='customer_list.php?deleteid=".$row["dni"]."'><i class='bx bx-x' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access in">
            <input class="links" id="openMod" type="button" value="Add customer">
    </section>
    <?php
        if(isset($_GET["dni"])){

            $_GET["dni"] = $con->real_escape_string($_GET["dni"]);
                    
            echo "<dialog id='modal'>
                    <form method='POST' action='customer_edit_process.php?dni=".$_GET['dni']."'>
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
                        <td><a href='customer_list.php'><input class='links' id='closeMod' type='button' value='<< Back'></a></td>
                        <td><input name='confirm_c_edit' class='links' type='submit' value='Confirm'></td>
                    </tr>
                </table>
                </form>
            </dialog>
            <script>
            const modal = document.querySelector('#modal');
            const openModal = document.getElementById('openMod');
            const closeModal = document.getElementById('closeMod');

            modal.showModal();

            </script>";
            }
 
        } else {
            ?>
    <dialog id="modal">
        <form method='post' action='customer_edit_process.php'>
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
                    <td><input class='links' id='closeMod' type='button' value='<< Back'></td>
                    <td><input name='confirm_c_add' class='links' type='submit' value='Confirm'></td>
                </tr>
            </table>
        </form>
        <?php } ?>
    </dialog>
</main>
<script>
    const modal = document.querySelector("#modal");
    const openModal = document.getElementById("openMod");
    const closeModal = document.getElementById("closeMod");

    openModal.addEventListener('click', () => {
        modal.showModal();
    })

    closeModal.addEventListener('click', () => {
        modal.close();
    })
</script>
</body>
</html>