<?php 
    include_once "../config/connection.php";
    include_once "../models/customers.php";
    include_once "../models/users.php";
    
    $validateInsert = new insertValidation($_POST);
    $ErrorInsert = $validateInsert->checkInsertVal();
    if(count($ErrorInsert)==0){

        $conn = new Connection();        

        $insertCust = new Custromers($conn->getDB());

        $insert = $insertCust->insertCustomer($_POST);

        if($insert){
            include_once 'selectUserDataAdd.php';
            //require_once "/selectUserDataEdit.php";
            include_once 'addChange.php';
            echo $newAddedStatus;

            //Set Array with table data
            unset($_SESSION["CustomersArray"]);
            if($_SESSION["user_status"]==1){
                $_SESSION["CustomersArray"] = $insertCust->selectUserCustomers($_SESSION["userData"]["user_id"]);  
            }else{
                $_SESSION["CustomersArray"] = $insertCust->selectAllCustomers();
            }

            include_once '../files/addMore.php';
        }else{
            $ErrorInsert["notInserted"] = "Error! Data not inserted!";
        }


    }
?>