<?php 

        include_once "../config/connection.php";
        include_once "../models/customers.php";
        //Select Customers from one user...
        $dbConn1 = new Connection();

        $userCustomers = new Custromers($dbConn1->getDB());

        $_SESSION["CustomersArray"] = $userCustomers->selectUserCustomers($_SESSION["userData"]["user_id"]);    
    
?>
