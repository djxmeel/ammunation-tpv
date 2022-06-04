<?php
    require_once("../modules/sql.php");

    session_start();

    $username = trim($_POST["user"]);  //removing spaces from input
    $password = trim($_POST["pass"]);

    if(empty($username) || empty($password)){
        if(empty($username)) $_SESSION["emptyuser"] = true;  // if 1 or both empty, return to login page
        if(empty($password)) $_SESSION["emptypass"] = true;  // with suitable message

        header("Location: ../login/login.php");

        exit();
    }

    $stmt= $con->prepare("SELECT * FROM empleados WHERE usuario=? AND pass=?"); //prepare statement

    $stmt->bind_param("ss", $username, $password); // bind parameters (string, string)
    $stmt->execute();                               // execute the query
    
    $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){

            $_SESSION["loggedAs"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["employeeId"] = $row["id"];
            $_SESSION["isadmin"] = $row["isadmin"];
            header("Location: ../index/index.php");
            exit();
        }
        

    $_SESSION["nocredentials"] = true;
    header("Location: ../login/login.php");
?>