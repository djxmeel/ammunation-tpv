<?php
        session_start();

        if(isset($_SESSION["loggedAs"])){
            header("Location: ../index/index.php");
            exit();
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/logstyle.css">
    <title>LOGIN TO AMMUNATION</title>
</head>
<body>
    <main class="login-field">
        <img src="../img/banner.png" alt="AMMUNATION" class="login-banner">
        <form action="processlog.php" method="post">
            <h2>Login</h2>
            User : <input type="text" name="user" placeholder="Username" size="28">
            <br>
            Pass : <input type="password" name="pass" placeholder="Password" size="28">
            <div><?php 
                if(isset($_SESSION["nocredentials"])){
                    echo "Wrong credentials!";
                }elseif(isset($_SESSION["emptyuser"]) && isset($_SESSION["emptypass"])) {
                    echo "Username and password field are empty.";
                }elseif(isset($_SESSION["emptyuser"])){
                    echo "Username field is empty.";
                }elseif(isset($_SESSION["emptypass"])){
                    echo "Password field is empty.";
                }

                session_destroy();
            ?></div>
            <input type="submit" value="Login">
        </form>
    </main>
</body>
</html>
