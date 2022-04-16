<?php 
    session_start();
    include('../logic/main.php');

    // if(count($_SESSION)>0 && array_key_exists("logged",$_SESSION) && $_SESSION["logged"]){
    //     echo "da";
    // }else{
    //     echo "ne";
    // }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php");?>

    <?php if(!(count($_SESSION)>0 && array_key_exists("logged",$_SESSION) && $_SESSION["logged"])):?>
        <div class="displayFlex notLoggedIndex center">
            <h1>Please log in or register your account!</h1>
        </div>
    <?php else:?>


        <?php include("./loggedUserData.php");?>

        <div class="displayFlex notLoggedIndex" style="min-height: 750px;">

            <?php include("./indexTwoButtons.php");?>

            <?php if($_SESSION["user_status"] != 1):?>

                <?php include("../apis/selectUserKunde.php");?>


            <?php else:?>

                <?php include("../apis/selectAllKunde.php");?>

            <?php endif?>
        </div>
    <?php endif?>

    <?php include("./footer.php");?>
</html>