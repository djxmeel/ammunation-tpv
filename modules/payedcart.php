<?php 
    session_start();
    require_once("sql.php");

    $last_id;

    if(isset($_SESSION["actual"])){
        if(sizeof($_SESSION["actual"]["id"]) > 0){
            
            $query = "INSERT INTO compras(id_empleado, dni_cliente, fecha, importe, estado, aparcada) VALUES (?,?,?,?,?,?);";
            
            $empId = $_SESSION["employeeId"];
            $dni = $_SESSION["client"];
            $date = date("Y-m-d");
            $importe = $_SESSION["total"];
            $estado = 1;
            $aparcada = 0;

        
            $stmt = $con->prepare($query);
            $stmt->bind_param("issiii", $empId, $dni, $date, $importe, $estado, $aparcada);

            $stmt->execute();

            $last_id=$stmt->insert_id;

            $query = "INSERT INTO detalles_compra(id_compra, id_producto, cantidad, precio_venta) VALUES (?,?,?,?);";
            
            $stmt = $con->prepare($query);
            $stmt->bind_param("iiii", $id_compra, $id_producto, $cantidad, $precio_venta);

            for ($i=0 ; $i < sizeof($_SESSION["actual"]["id"]) ; $i++) {
                $id_compra = $last_id;
                $id_producto = $_SESSION["actual"]["id"][$i];
                $cantidad =  $_SESSION["actual"]["quantity"][$i];
                $precio_venta = $_SESSION["actual"]["subtotal"][$i] / $cantidad;

                $stmt->execute();
            }
        }
    } else {
        header("Location: ../index/index.php");
    }

    include_once("clearcart.php");

    header("Location: ../index/index.php");
?>