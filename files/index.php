<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <!-- Include Header -->
    <?php include("./header.php");?>

    <?php if(!(count($_SESSION)>0 && array_key_exists("logged",$_SESSION) && $_SESSION["logged"])):?>
        <div class="displayFlex notLoggedIndex center">
            <h1>Please log in or register your account!</h1>
        </div>
    <?php else:?>

        <!-- Include Div with user data deleted/Adder/Edited -->
        <?php include("./loggedUserData.php");?>
        <!--Div With data!-->
        <div class="displayFlex notLoggedIndex" style="min-height: 750px;">
            <!-- Include div with two optin butons and addCustomer button -->
            <?php include("./indexTwoButtons.php");?>
            <!-- if user_status = 1 then include file with just Customers from one user  -->
            <?php if($_SESSION["user_status"] != 1):?>

                <?php include("./selectUserKunde-html.php");?>

            <!-- else include all customers! -->
            <?php else:?>

                <?php include("./selectAllKunde-html.php");?>

            <?php endif?>
        </div>
    <?php endif?>
    <!-- Include footer at the end -->
    <?php include("./footer.php");?>
</html>