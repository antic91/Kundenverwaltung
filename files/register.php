<?php
    session_start();
    include '../validation/registerValidation.php';
    include '../config/connection.php';
    include '../models/users.php';

    $errorRegister = [];


    if(isset($_POST["submit"])){

        include_once '../apis/registerApi.php';

    }
    

?>

<!DOCTYPE html>
<html lang="en">
    <!-- Include Header -->
    <?php include("./header.php");?>
    <!-- Wrapper for form -->
    <div class="displayFlex notLoggedIndex center" style="height: 750px;">
        <!-- Form Post to register -->
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
            <!-- Enter Username Div -->
            <div class="inputWrapper displayFlex">
                <label for="username">Enter username</label>
                <input type="text" name="username" id="username" 
                value="<?php     if(array_key_exists('username',$_POST)){
                                    echo htmlspecialchars($_POST['username']) ?? '';
                                }; ?>"
                >
                <!-- Error Username must be.. -->
                <?php if(array_key_exists("username",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["username"]?> </p>
                <?php endif?>
                <!-- Error Username Exists -->
                <?php if(array_key_exists("usernameExists",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["usernameExists"]?> </p>
                <?php endif?>

            </div>  
            <!-- Enter password Div -->        
            <div class="inputWrapper displayFlex">
                <label for="password">Enter password</label>
                <input type="password" name="password" id="password">
                <!-- Error password must be.. -->    
                <?php if(array_key_exists("password",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["password"]?> </p>
                <?php endif?>

            </div>
            <!--Repeat password Div -->        
            <div class="inputWrapper displayFlex">
                <label for="password1">Repeat password</label>
                <input type="password" name="password1" id="password1">
                 <!-- Error password must be.. -->    
                <?php if(array_key_exists("password1",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["password1"]?> </p>
                <?php endif?>
                <!-- Error passwords dont match -->    
                <?php if(array_key_exists("notSamePasswords",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["notSamePasswords"]?> </p>
                <?php endif?>

            </div>
            <!-- Enter Email Div -->        
            <div class="inputWrapper displayFlex">
                <label for="email">Enter Email</label>
                <input type="text" name="email" id="email" 
                value="<?php     if(array_key_exists('email',$_POST)){
                                    echo htmlspecialchars($_POST['email']) ?? '';
                                }; ?>"
                >
                <!-- Error Email must be.. -->                
                <?php if(array_key_exists("email",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["email"]?> </p>
                <?php endif?>
                <!-- Error Email exists.. -->    
                <?php if(array_key_exists("emailExists",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["emailExists"]?> </p>
                <?php endif?>

            </div>
            <!-- Enter Name Div -->        
            <div class="inputWrapper displayFlex">
                <label for="name">Enter Name</label>
                <input type="text" name="name" id="name" 
                value="<?php     if(array_key_exists('name',$_POST)){
                                    echo htmlspecialchars($_POST['name']) ?? '';
                                }; ?>"
                >
                <!-- Error name must be.. -->
                <?php if(array_key_exists("name",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["name"]?> </p>
                <?php endif?>
                
            </div>
            <!-- Enter Lastname Div -->        
            <div class="inputWrapper displayFlex">
                <label for="lastName">Enter Lastname</label>
                <input type="text" name="lastName" id="lastName" 
                value="<?php     if(array_key_exists('lastName',$_POST)){
                                    echo htmlspecialchars($_POST['lastName']) ?? '';
                                }; ?>"
                >
                <!-- Error lastName must be.. -->
                <?php if(array_key_exists("lastName",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["lastName"]?> </p>
                <?php endif?>

            </div>
            <!-- Enter Birthday Div -->        
            <div class="inputWrapper displayFlex">
                <label for="birthday">Enter Birthday</label>
                <input type="date" name="birthday" id="birthday" 
                value="<?php     if(array_key_exists('birthday',$_POST)){
                                    echo htmlspecialchars($_POST['birthday']) ?? '';
                                }; ?>"
                >
                                
                <?php if(array_key_exists("notInserted",$errorRegister)):?>
                    <p class="errorP"> <?php echo $errorRegister["notInserted"]?> </p>
                <?php endif?>
            </div>
           <!-- Input Submit Register -->
            <input type="submit" class="loginBTN" name="submit" value="Register">

        </form>

            
    </div>



    <?php include("./footer.php");?>
</html>