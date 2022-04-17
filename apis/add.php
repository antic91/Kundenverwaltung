<?php 
    include_once "../config/connection.php";
    include_once "../models/customers.php";
    include_once "../models/users.php";
    //Validate data
    $validateInsert = new insertValidation($_POST);
    $ErrorInsert = $validateInsert->checkInsertVal();

    //If there is no errors in array make connection
    if(count($ErrorInsert)==0){

        $conn = new Connection();        
        //Make new Customer with connetion
        $insertCust = new Custromers($conn->getDB());
        //Insert data
        $insert = $insertCust->insertCustomer($_POST);

        if($insert){
            //If inserted include this two file to select user data from sql and then to add change to user_added
            include_once 'selectUserDataAdd.php';

            include_once 'addChange.php';

        

            //Set Array with table data
            unset($_SESSION["CustomersArray"]);
            if($_SESSION["user_status"]==1){
                $_SESSION["CustomersArray"] = $insertCust->selectUserCustomers($_SESSION["userData"]["user_id"]);  
            }else{
                $_SESSION["CustomersArray"] = $insertCust->selectAllCustomers();
            }
            ///At the end open file to ask do user want to add more customers or not
            include_once '../files/addMore.php';
        }else{
            $ErrorInsert["notInserted"] = "Error! Data not inserted!";
        }


    }
?>