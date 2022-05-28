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
</main>
</body>
</html>