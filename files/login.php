<?php 
    session_start();
    include '../validation/loginValidation.php';
    include '../config/connection.php';
    include '../models/users.php';

    $errLogin = [];

    if(isset($_POST["submit"])){
        
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
                $_SESSION["user_added"] = $userLogged["user_added"];
                $_SESSION["user_edited"] = $userLogged["user_edited"];
                $_SESSION["user_deleted"] = $userLogged["user_deleted"];
                $_SESSION["user_status"] = 1;
                header('Location: ./index.php'); 
    
            }else{
                $errLogin["InvalidLogin"] = "Invalid Credentials";
            }

            
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php");?>

    <div class="displayFlex notLoggedIndex center" style="height: 550px;">

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
            
            <div class="inputWrapper displayFlex">
                <label for="username">Enter your username</label>
                <input type="text" name="username" id="username" >

                <?php if(array_key_exists("username",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["username"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="password">Enter your password</label>
                <input type="password" name="password" id="password" >

                <?php if(array_key_exists("password",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["password"]?> </p>
                <?php endif?>

                <?php if(array_key_exists("InvalidLogin",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["InvalidLogin"]?> </p>
                <?php endif?>

            </div>

            <input type="submit" class="loginBTN" name="submit" value="Login">

        </form>
            
    </div>


    <?php include("./footer.php");?>
</html>

