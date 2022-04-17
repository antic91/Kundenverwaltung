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

        include_once './selectUserData.php';
        include_once './deleteChange.php';
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
