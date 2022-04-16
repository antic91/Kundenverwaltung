<?php
    session_start();
    include '../validation/registerValidation.php';
    include '../config/connection.php';
    include '../models/users.php';

    $errorRegister = [];


    if(isset($_POST["submit"])){

        $validateRegister = new ValidateRegister($_POST);
        $errorRegister = $validateRegister->checkRegisterData();

        $conn = new Connection();

        $insertUser = new Users($conn->getDB());

        //Checking if username exsists
        $checkUserName = $insertUser->checkUsername($_POST["username"]);
        if($checkUserName){
            $errorRegister["usernameExists"] = "Username already exists";
        }

        $checkEmail = $insertUser->checkEmail($_POST["email"]);
        if($checkEmail){
            $errorRegister["emailExists"] = "Email already exists";
        }

        if(count($errorRegister)==0){

            $insert = $insertUser->insert($_POST);

            if($insert){
                session_destroy();
                header("Location: ./login.php");
            }else{
                $errorRegister["notInserted"] = "Error! Data not inserted!";
            }


        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php");?>

    <div class="displayFlex notLoggedIndex center" style="height: 750px;">

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
            
            <div class="inputWrapper displayFlex">
                <label for="username">Enter your username</label>
                <input type="text" name="username" id="username">

                <?php if(array_key_exists("username",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["username"]?> </p>
                <?php endif?>

                <?php if(array_key_exists("usernameExists",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["usernameExists"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="password">Enter your password</label>
                <input type="password" name="password" id="password">

                <?php if(array_key_exists("password",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["password"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="password1">Repeat your password</label>
                <input type="password" name="password1" id="password1">

                <?php if(array_key_exists("password1",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["password1"]?> </p>
                <?php endif?>

                <?php if(array_key_exists("notSamePasswords",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["notSamePasswords"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="email">Enter your Email</label>
                <input type="text" name="email" id="email">

                <?php if(array_key_exists("email",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["email"]?> </p>
                <?php endif?>

                <?php if(array_key_exists("emailExists",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["emailExists"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="name">Enter your Name</label>
                <input type="text" name="name" id="name">

                <?php if(array_key_exists("name",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["name"]?> </p>
                <?php endif?>
                
            </div>

            <div class="inputWrapper displayFlex">
                <label for="lastName">Enter your Lastname</label>
                <input type="text" name="lastName" id="lastName">

                <?php if(array_key_exists("lastName",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["lastName"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="birthday">Enter your Birthday</label>
                <input type="date" name="birthday" id="birthday">

                <?php if(array_key_exists("notInserted",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["notInserted"]?> </p>
                <?php endif?>
            </div>

            <input type="submit" class="loginBTN" name="submit" value="Register">

        </form>

            
    </div>



    <?php include("./footer.php");?>
</html>