<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/style.css">
    <script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous">
    </script>
</head>
<body>
    <?php
        session_start();
        
        if(isset($_GET["logout"])){ // Unsets the login if logout button is submitted
            unset($_SESSION["loggedAs"]);
            unset($_GET["logout"]);
        }

        if(!isset($_SESSION["loggedAs"])){
            header("Location: ../login/login.php");
            exit(); 
        }
    ?>
    <div class="sidebar">
        <div class="logo_content">
            <img src="../img/ammunation_logo.webp" class="logo" alt="AMMUNATION">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search-alt' ></i>
                <form action="../product/product_list.php" method="GET">
                    <input type="text" placeholder="Search..." name="search" id="search">
                </form>
            </li>
            <li>
                <a href="../index/index.php">
                    <i class='bx bx-cart-add'></i>
                    <span class="links_name">NEW</span>
                </a>
                <span class="tooltip">NEW</span>
            </li>
            <li>
                <a href='../admin/users.php'>
                    <i class='bx bx-cart-download'></i>
                    <span class='links_name'>LOAD</span>
                </a>
                <span class='tooltip'>LOAD</span>
            </li>
            <li>
                <a href="../product/product_list.php">
                    <i class='bx bx-save' ></i>
                    <span class="links_name">SAVE CURRENT</span>
                </a>
                <span class="tooltip">SAVE CURRENT</span>
            </li>
            <li>
                <a href="../categories/category_list.php">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links_name">REFUND</span>
                </a>
                <span class="tooltip">REFUND</span>
            </li>
            <li>
                <a href="../customer/customer_list.php">
                    <i class='bx bx-group' ></i>
                    <span class="links_name">CUSTOMERS</span>
                </a>
                <span class="tooltip">CUSTOMERS</span>
            </li>
            <li>
                <a href="../purchases/purchases_list.php">
                    <i class='bx bxs-user-account'></i>
                    <span class="links_name">SWITCH USER</span>
                </a>
                <span class="tooltip">SWITCH USER</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <i class='bx bx-user' ></i>
                    <div class="name_role">
                        <div class="name"><?php echo strtoupper($_SESSION["username"]) ?></div>
                    </div>
                </div>
                <a href="../index/index.php?logout=1">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </div>
    </div>
    <script src="../js/sidebar.js"></script>