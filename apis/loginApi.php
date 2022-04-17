<?php 
        //Validate post data
        $validateLogin = new ValidateLogin($_POST);

        $errLogin = $validateLogin->checkLogin();

        if(count($errLogin) == 0){
            //if no errors new connection
            $db = new Connection();
            //New USer with connection
            $login = new Users($db->getDB());
            //select user
            $userLogged = $login->selectUser(htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["password"]));

            //if usr logged in thed add some data to Session array and relocate
            if($userLogged){
                $_SESSION["logged"] = true;
                $_SESSION["userData"] = $userLogged;
                $_SESSION["user"] = $userLogged["user_username"];
                $_SESSION["user_added"] = $userLogged["user_added"];
                $_SESSION["user_edited"] = $userLogged["user_edited"];
                $_SESSION["user_deleted"] = $userLogged["user_deleted"];
                $_SESSION["user_status"] = 1;
                header('Location: ./index.php'); 
    
            }else{
                $errLogin["InvalidLogin"] = "Invalid Credentials";
            }

            
        }
?>