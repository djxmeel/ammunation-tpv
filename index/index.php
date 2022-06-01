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
                    <th class="th-small">Image</th>
                    <th>Name</th>
                    <th class="th-small">Stock</th>
                    <th class="th-small">Add</th>
                </tr>
                <?php 
                    if(!isset($_GET["cat"])) $query = "SELECT * FROM productos";

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                                <td class='td-small product-row'><img src='../img/guns/".$row["img"]."'></td>
                                <td class='product-row'>".$row["nombre"]."</td>";

                                if($row["stock"] > 0) echo "<td class='td-small product-row'><i class='bx bx-check'></i></td>";
                                else echo "<td class='td-small'><i class='bx bx-x'></i></td>";
                        
                        echo    "<td class='td-small product-row'><button id='".$row["id"]."' onclick='shopcart(this.id)'><i class='bx bx-plus-circle'></i></button></td>
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
        <section class="payment">
                <div id="totalPrice">
                    <h1>Total: <?php echo $_SESSION["total"];?></h1>  
                </div>
                <div class="payment methods">
                    <input type="button" value="Cash" onclick="openModal('modal2')" class="links payment"><br>
                    <input type="button" value="Paypal" onclick="openModal('modal1')" class="links payment">
                </div>
        </section>
    </article>
    </main>
    <dialog id="modal1">
        <img src="../img/frame.png" alt="QRcode">
        <div>
            <a href="../modules/payedcart.php" class="testt">
                <input type="button" onclick="payednotif(this)" value="Confirm payment" class="links">
            </a>
            <input type="button" value="Close" onclick="closeModal('modal1')" class="links">
        </div>
    </dialog>
    <dialog id="modal2">
        <div>
            <section class="calculator">
                <div>
                    <h1>Total: </h1>
                    <input type="text" id="changeInp" placeholder="Amount">
                </div>
                <div>
                    <div id="change">
                        Change: 
                   </div> 
                </div>
            </section>
            <a href="../modules/payedcart.php" >
                <input type="button" onclick="payednotif(this)" value="Confirm payment" class="links">
            </a>
            <input type="button" value="Change" onclick="getChange()" class="links">
            <input type="button" value="Close" onclick="closeModal('modal2')" class="links">
        </div>
    </dialog>
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

        function openModal(dialog){
            const modal = document.getElementById(dialog);
            $(".calculator h1").load("../modules/totalPrice.php", null, modal.showModal());
            $("#changeInp").val("");
            $("#change").text("Change: ");
        }
        
        function closeModal(dialog){
            const modal = document.getElementById(dialog);
            modal.close();
        }

        function payednotif(element){
            element.value = "Loading...";
        }

        function getChange(){
            input = $("#changeInp").val();
            $.ajax({
                url:"../modules/getChange.php",
                type: "GET",
                data: {
                    inp: input
                },
                success: function(htmlBlock){
                    $("#change").text(htmlBlock);
                }
            })
        }
    </script>
</body>
</html>