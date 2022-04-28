<?php
    session_start();
    require_once("../modules/sql.php");

    if(isset($_POST["confirm_c_edit"])){

        $stmt= $con->prepare("UPDATE clientes SET dni=?, nombre=?, apellido1=?, apellido2=?, direccion=?, contacto=? WHERE dni='".$_GET["dni"] . "'"); //prepare statement

        $stmt->bind_param("sssssi", $_POST["c_dni"], $_POST["c_name"],$_POST["c_last1"], // bind parameters (string, string)
                            $_POST["c_last2"], $_POST["c_address"], $_POST["c_contact"]);       
        $stmt->execute();
        
        // TODO file upload
        header("Location: customer_list.php");
 
        unset($_POST["confirm_c_edit"], $_POST["c_dni"], $_POST["c_name"],$_POST["c_last1"], $_POST["c_last2"],
                $_POST["c_address"], $_POST["c_contact"]);
    }

    if(isset($_POST["confirm_c_add"])){

        $stmt= $con->prepare("INSERT INTO clientes(dni ,nombre, apellido1, apellido2, direccion, contacto, fecha_alta) VALUES (?,?,?,?,?,?,?)"); //prepare statement

        $stmt->bind_param("sssssis", $_POST["c_dni"], $_POST["c_name"],$_POST["c_last1"], // bind parameters (string, string)
                            $_POST["c_last2"], $_POST["c_address"], $_POST["c_contact"], $_POST["c_date"]);
        $stmt->execute();
        
        unset($_POST["confirm_c_add"], $_POST["c_dni"], $_POST["c_name"],$_POST["c_last1"], $_POST["c_last2"],
        $_POST["c_address"], $_POST["c_contact"], $_POST["c_date"]);
        
        header("Location: customer_list.php");
        
    }
?>