<?php 

$validateLogin = new ValidateLogin($_POST);

        $errLogin = $validateLogin->checkLogin();

        if(count($errLogin) == 0){

            $db = new Connection();

            $login = new Users($db->getDB());

            $userLogged = $login->selectUser(htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["password"]));


            if($userLogged){
                $_SESSION["logged"] = true;
                $_SESSION["userData"] = $userLogged;
                $_SESSION["user"] = $userLogged["user_username"];
                $_SESSION["c"] = $userLogged["user_added"];
                $_SESSION["user_edited"] = $userLogged["user_edited"];
                $_SESSION["user_deleted"] = $userLogged["user_deleted"];
                $_SESSION["user_status"] = 1;
                header('Location: ./index.php'); 
    
            }else{
                $errLogin["InvalidLogin"] = "Invalid Credentials";
            }

            
        }
?>