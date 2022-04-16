<?php 
    session_start();
    include_once "../config/connection.php";
    include_once "../models/customers.php";
    include_once "../models/users.php";

    $data = file_get_contents('php://input');
    

    $decoded= json_decode($data);

    if($decoded){
        $id =  $decoded -> parameter;
        
        $dbCon = new Connection();

        //Delete customer
        $deleteCustomer = new Custromers($dbCon->getDB());
        $deleteCustomer->deleteCustomers($id);

        //Update data by user after header
        $user = new Users($dbCon->getDB());
        $userData = $user->selectDataUser($_SESSION["userData"]["user_id"]);
        $newDeletedStatus = $userData["user_deleted"]+1;
        $user->afterDelete($newDeletedStatus,$_SESSION["userData"]["user_id"]);
        $_SESSION["user_deleted"] = $newDeletedStatus;

        echo $newDeletedStatus;

        //Set Array with table data
        unset($_SESSION["CustomersArray"]);
        if($_SESSION["user_status"]==1){
            $_SESSION["CustomersArray"] = $deleteCustomer->selectUserCustomers($_SESSION["userData"]["user_id"]);  
        }else{
            $_SESSION["CustomersArray"] = $deleteCustomer->selectAllCustomers();
        }
 
    }

?>
