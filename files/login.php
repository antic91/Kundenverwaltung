<?php 
    session_start();
    
    include '../validation/loginValidation.php';
    include '../config/connection.php';
    include '../models/users.php';

    $errLogin = [];

    if(isset($_POST["submit"])){
        include_once '../apis/loginApi.php';
    }


?>


    <!-- Include Header -->
    <?php include("./header.php");?>
    <!-- Wrapper div for form -->
    <section class="displayFlex notLoggedIndex center" style="min-height: 550px;">
        <!-- Form with Post request -->
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
            
            <div class="inputWrapper displayFlex">
                <label for="username">Enter username</label>
                <input type="text" name="username" id="username" 
                value="<?php     if(array_key_exists('username',$_POST)){
                                    echo htmlspecialchars($_POST['username']) ?? '';
                                }; ?>"
                                
                >

                <?php if(array_key_exists("username",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["username"]?> </p>
                <?php endif?>

            </div>

            <div class="inputWrapper displayFlex">
                <label for="password">Enter password</label>
                <input type="password" name="password" id="password" >

                <?php if(array_key_exists("password",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["password"]?> </p>
                <?php endif?>

                <?php if(array_key_exists("InvalidLogin",$errLogin)):?>
                    <p class="errorP"> <?php echo $errLogin["InvalidLogin"]?> </p>
                <?php endif?>

            </div>
           <!-- Input Submit Login -->
            <input type="submit" class="loginBTN" name="submit" value="Login">

        </form>
            
    </section>


    <?php include("./footer.php");?>


