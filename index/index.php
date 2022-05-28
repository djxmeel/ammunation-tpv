<?php require_once("../modules/header.php");
require_once("../modules/sql.php");
?>
<script>
    $(document).ready(function() {
        $("#newcart").click(function(){
            if(confirm('An unsaved cart will be lost!'))
                $('#cart').load('../modules/clearcart.php');
        });
    });
</script>
<title>WELCOME TO AMMUNATION</title>
<main class="home_content">
    <h1 id="welcome-msg">WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-crosshair'></i></h1>
    <article class="dash-content row">
        <section class="col-5 ">
            <h1>Cart</h1>
        </section>
        <section class="col-5 product-list">
            <h1>Products</h1>
        </section>
        <section class="col-2">
            <h1>Categories</h1>
        </section>
        <section class="cart col-5">
            <table id="cart" class="cart">
                <?php include("../modules/refreshCart.php") ?>        
            </table>
        </section>
        <section class="col-5 product-to-cart">
            <table class="product-to-cart">
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
                    if(!isset($_GET["cat"])) $query = "SELECT * FROM productos";

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
                ?>
            </table>
        </section>
        <section class="col-2">
            <div class="grid-categories">
                <button id='0' onclick="categorySwitch(this.id)"><img src="../img/icon.png"  class="item-category"></button>
                <?php
                    $query = "SELECT * FROM categorias;";

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo "<button id='".$row["id"]."' onclick='categorySwitch(this.id)'><img src='../img/icons/".$row["img"]."' class='item-category'></button>";
                    }

                ?>
            </div>
        </section>
        <script>
            function categorySwitch(id) {
                $.ajax({
                    url: "../modules/categorySwitch.php",
                    type: "GET",
                    data: {"cat": id},
                    success: function(htmlBlock) {
                        $("table.product-to-cart").html(htmlBlock);
                    }
                });
            }

            function shopcart(id){
                $.ajax({
                    url: "../modules/shopcart.php",
                    type: "POST",
                    data: {"id": id},
                    success: function(htmlBlock) {
                        $("table#cart").html(htmlBlock);
                    },
                    complete: function() {
                       $("#totalPrice").load("../modules/totalPrice.php");
                    }
                });
            };

            function deleteFromCart(id){
                $.ajax({
                    url: "../modules/refreshCart.php",
                    type: "POST",
                    data: {"id_delete": id},
                    success: function(htmlBlock){
                        $("table#cart").html(htmlBlock);
                    },
                    complete: function(){
                        $("#totalPrice").load("../modules/totalPrice.php");
                    }
                });
            }

            function clearBtn(){
                $("#cart").load("../modules/clearcart.php", 
                                null, 
                                function() {
                                    $("#totalPrice").load("../modules/totalPrice.php");
                                });
            };

            function switchClient(value){
                $.ajax({
                    url: "../modules/switchClient.php",
                    type: "POST",
                    data: {"dni": value},
                });
            };
        </script>
        <section class="payment">
                <div id="totalPrice">
                    <h1>Total: <?php echo $_SESSION["total"];?></h1>  
                </div>
                <div class="payment methods">
                    <input type="button" value="Cash" class="links payment"><br>
                    <input type="button" value="Paypal" class="links payment">
                </div>
        </section>
    </article>
</main>
</body>
</html>