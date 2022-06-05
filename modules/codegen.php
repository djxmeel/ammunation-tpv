<?php
    require_once("sql.php");

    $numberOfProducts = 53;

    for ($i=1; $i <= $numberOfProducts; $i++) { 
        $code1 = rand(10000, 99999);
        $code2 = rand(10000, 99999);
    
        $code = $code1 . $code2;
    
        $stmt= $con->prepare("SELECT code FROM productos WHERE code=?"); //prepare statement
    
        $stmt->bind_param("s", $code); // bind parameters
        $stmt->execute();                               // execute the query
        
        $result = $stmt->get_result();
        $insert = true;
    
        while($row = $result->fetch_assoc()){
            $insert = false;
        }

        if(!$insert){
            $i--;
            continue;
        }

        $stmt= $con->prepare("UPDATE productos SET code=? WHERE id=".$i); //prepare statement
        $stmt->bind_param("s", $code); // bind parameters
        $stmt->execute(); 
    } 
?>