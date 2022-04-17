<?php 
    session_start();
    include_once "../config/connection.php";
    include_once "../models/customers.php";
    include_once "../models/users.php";
    
    //Gett data from input and decode json..
    $data = file_get_contents('php://input');
    
    $decoded= json_decode($data);

    if($decoded){
        //Get id data
        $id =  $decoded -> parameter;
        
        $dbCon = new Connection();

        //Delete customer with this id
        $deleteCustomer = new Custromers($dbCon->getDB());
        $deleteCustomer->deleteCustomers($id);
        //Include this two files to set user_deleted...
        include_once './selectUserData.php';
        include_once './deleteChange.php';


        //Set Array with table data
        unset($_SESSION["CustomersArray"]);
        if($_SESSION["user_status"]==1){
            $_SESSION["CustomersArray"] = $deleteCustomer->selectUserCustomers($_SESSION["userData"]["user_id"]);  
        }else{
            $_SESSION["CustomersArray"] = $deleteCustomer->selectAllCustomers();
        }
 
    }

?>
