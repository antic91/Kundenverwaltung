<?php 
    //Validate data from post
    $validateRegister = new ValidateRegister($_POST);
    $errorRegister = $validateRegister->checkRegisterData();

    $conn = new Connection();

    $insertUser = new Users($conn->getDB());

    //Checking if username exsists
    $checkUserName = $insertUser->checkUsername($_POST["username"]);
    if($checkUserName){
        $errorRegister["usernameExists"] = "Username already exists";
    }
    //Check email...
    $checkEmail = $insertUser->checkEmail($_POST["email"]);
    if($checkEmail){
        $errorRegister["emailExists"] = "Email already exists";
    }
    
    if(count($errorRegister)==0){
        //if no errors insert..
        $insert = $insertUser->insert($_POST);

        if($insert){
            session_destroy();
            header("Location: ./login.php");
        }else{
            $errorRegister["notInserted"] = "Error! Data not inserted!";
        }


    }
?>