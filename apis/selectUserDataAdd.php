<?php 
    // include_once "../config/connection.php";
    // include_once "../models/users.php";

    
        //Setting new user_added .. Div under navigation
        $dbCon = new Connection();

        
        $user = new Users($dbCon->getDB());


        $userData = $user->selectDataUser($_SESSION["userData"]["user_id"]);
        $newAddedStatus = $userData["user_added"]+1;

?>