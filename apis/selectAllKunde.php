<?php 

        include_once "../config/connection.php";
        include_once "../models/customers.php";

        $dbConn = new Connection();

        $allCustomers = new Custromers($dbConn->getDB());

        $_SESSION["CustomersArray"] = $allCustomers->selectAllCustomers();

    

?>
