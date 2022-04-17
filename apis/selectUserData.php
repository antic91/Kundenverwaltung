<?php 
    include_once "../config/connection.php";
    include_once "../models/users.php";

    
        
        $dbCon = new Connection();

        //Update data by user after header
        $user = new Users($dbCon->getDB());


        $userData = $user->selectDataUser($_SESSION["userData"]["user_id"]);
        $newDeletedStatus = $userData["user_deleted"]+1;


?>