<?php 
    include_once "../config/connection.php";
    include_once "../models/customers.php";
    include_once "../models/users.php";
    //validate post data
    $validateInsert = new insertValidation($_POST);
    $ErrorInsert = $validateInsert->checkInsertVal();
    //if no errors in errors array make connection
    if(count($ErrorInsert)==0){

        $conn = new Connection();        
        //new Customer class with connection
        $insertCust = new Custromers($conn->getDB());
        //Insert data
        $insert = $insertCust->editCustomer($_POST,$_SESSION["POST"]["kun_id"]);

        if($insert){
            ///If inserted include this two files to get and add changes in user_edited
            include_once 'selectUserDataEdit.php';

            include_once 'editChange.php';


            //Set Array with table data
            unset($_SESSION["CustomersArray"]);
            if($_SESSION["user_status"]==1){
                $_SESSION["CustomersArray"] = $insertCust->selectUserCustomers($_SESSION["userData"]["user_id"]);  
            }else{
                $_SESSION["CustomersArray"] = $insertCust->selectAllCustomers();
            }
            //Relocate to index.php
            header("Location: ../files/index.php");
        }else{
            $ErrorInsert["notInserted"] = "Error! Data not inserted!";
        }


    }
?>