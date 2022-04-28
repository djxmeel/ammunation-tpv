<?php require_once("../modules/header.php");
require_once("../modules/sql.php");?>
<title>WELCOME TO AMMUNATION</title>
<main class="home_content">
    <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-crosshair'></i></h1>
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
            <table class="cart">
                    <tr>
                        <th colspan="2" class="cart">ID Compra</th>
                        <td colspan="2" class="cart">
                            ID cliente
                            <select name="clientes" id="clientes">
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Product</th>
                        <th class="th-small">Quantity</th>
                        <th class="th-small">Unit</th>
                        <th class="th-small">Sub.</th>
                    </tr>
                    <tr>
                        <td>Gun name</td>
                        <td class="td-small">5</td>
                        <td class="td-small">3000</td>
                        <td class="td-small">15000</td>
                    </tr>
                </table>
        </section>
        <section class="col-5 product-to-cart">
            <table class="product-to-cart">
                <tr>
                    <th colspan="3">
                        <input type="text" name="productcode" id="productcode" placeholder="Search by code">
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th class="th-small">Stock</th>
                    <th class="th-small">Add</th>
                </tr>
                <tr>
                    <td class="td-small">Gun name</td>
                    <td class="td-small"><i class='bx bx-x'></i></td>
                    <td class="td-small"><i class='bx bx-plus-circle'></i></td>
                </tr>
                <tr>
                    <td class="td-small">Gun name</td>
                    <td class="td-small"><i class='bx bx-check'></i></td>
                    <td class="td-small"><i class='bx bx-plus-circle'></i></td>
                </tr>
            </table>
        </section>
        <section class="col-2">
            <div class="grid-categories">
                <img src="../img/icon.png" class="item-category">
                <img src="../img/icons/assaultrifle.png" class="item-category">
                <img src="../img/icons/submachinegun.png" class="item-category">
                <img src="../img/icons/shotgun.png" class="item-category">
                <img src="../img/icons/lmg.png" class="item-category">
                <img src="../img/icons/sniperrifle.png" class="item-category">
                <img src="../img/icons/handgun.png" class="item-category">
                <img src="../img/icons/meleeweapon.png" class="item-category">
                <img src="../img/icons/explosive.png" class="item-category">
                <img src="../img/icons/ammo.png" class="item-category">
            </div>
        </section>
        <section class="payment">
                <div class="">
                    <h1>Total:</h1>  
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