<?php 
    include_once "../config/connection.php";
    include_once "../models/users.php";

        
        $dbCon = new Connection();

        //Update data by user after header
        $user = new Users($dbCon->getDB());


        $user->afterEdit($newEditedStatus,$_SESSION["userData"]["user_id"]);
        $_SESSION["user_edited"] = $newEditedStatus;

 
    ?>