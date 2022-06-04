<?php
    require_once("../modules/sql.php");

    session_start();

    $username = trim($_POST["username"]);  //removing spaces from input
    $password = trim($_POST["password"]);
    $isadmin = $_POST["isadmin"];

    if(empty($username) || empty($password)){
        $_SESSION["emptyregister"] = true;  // if 1 or both empty, return to login page

        header("Location: ../login/switchuser.php");

        exit();
    }

    $stmt= $con->prepare("INSERT INTO empleados VALUES(NULL,?,?,?)"); //prepare statement

    $stmt->bind_param("ssi", $username, $password, $isadmin); // bind parameters (string, string, int)
    $stmt->execute();                               // execute the query
    
    header("Location: ../login/switchuser.php");
?>