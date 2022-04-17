<?php 
        session_start();
        include_once "../config/connection.php";
        include_once "../models/customers.php";

        $data = file_get_contents('php://input');
    

        $decoded= json_decode($data);

    if($decoded){
        $id =  $decoded -> parameter;
        $dbConn1 = new Connection();

        $userCustomers = new Custromers($dbConn1->getDB());

        $arrayToEdit = $userCustomers->selectOneCustomer($id);    
        $_POST = $arrayToEdit;
        $_SESSION["POST"] = $arrayToEdit;
        // header("Location: ../files/edit.php");
    }

    
?>
