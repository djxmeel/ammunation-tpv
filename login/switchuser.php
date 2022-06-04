<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Switch user</title>
<main class="home_content">
    <h1>Users <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>Username</th>
                <th>Admin</th>
                <th>Switch to</th>
            </tr>
            <?php

                $query = "SELECT * FROM empleados;";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    if($row["usuario"] != $_SESSION["username"]){
                        echo "
                        <tr>
                            <td class ='category-options'>". $row["usuario"]."</td>";
    
                        if($row["isadmin"])
                            echo "<td class='category-options'>Yes</td>";
                        else 
                            echo "<td class='category-options'>No</td>";
    
                        echo "
                            <td><a href='switchuserprocess.php?id=".$row["id"]."'><i class='bx bx-caret-right-circle'></i></a></td>
                        </tr>";
                    }
                } 
            ?>
        </table>
    </section>
    <?php
        if(isset($_SESSION["isadmin"])){
            if($_SESSION["isadmin"] == 1){
                echo "
                <section class='quick-access in'>
                    <input class='links' id='openMod' type='button' value='Register user'>
                </section>";
            }
        }
    ?>
</main>
<dialog id="modal">
    <form method='post' action='registeruser.php'>
        <table>
            <tr>
                <th><h2>Username: </h2></th>
                <td><input name='username' type='text'/></td>
            </tr>
            <tr>
                <th><h2>Password: </h2></th>
                <td><input name='password' type='password'/></td>
            </tr>
            <tr>
                <td><h2>Admin </h2></td>
                <td>
                    <select name="isadmin" id="isadmin">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input class='links' id='closeMod' type='button' value='<< Back'></td>
                <td><input name='confirm_c_add' class='links' type='submit' value='Confirm'></td>
            </tr>
        </table>
    </form>
</dialog>
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