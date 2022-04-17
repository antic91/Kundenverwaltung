<?php 
        session_start();
        include_once "../config/connection.php";
        include_once "../models/customers.php";
        //Get and decode data from input
        $data = file_get_contents('php://input');

        $decoded= json_decode($data);

    if($decoded){
        //get id and then select customers with this user_id
        $id =  $decoded -> parameter;
        $dbConn1 = new Connection();

        $userCustomers = new Custromers($dbConn1->getDB());

        $arrayToEdit = $userCustomers->selectOneCustomer($id);    
        $_POST = $arrayToEdit;
        //Set array in session
        $_SESSION["POST"] = $arrayToEdit;
        // header("Location: ../files/edit.php");
    }

    
?>
