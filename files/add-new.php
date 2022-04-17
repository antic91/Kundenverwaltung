<?php
    session_start();
    include_once '../validation/insertValidation.php';
    include_once '../models/customers.php';
    include_once '../config/connection.php';

    $ErrorInsert = [];


    if(isset($_POST["submit"])){
        
        include '../apis/add.php';
       

    }

    if(isset($_POST["cancel"])){
        header("Location: ./index.php");
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header.php");?>

    <?php include("./loggedUserData.php");?>

    <div class="displayFlex notLoggedIndex center" style="height: 950px;">

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
            
            <div class="inputWrapper displayFlex">
                <label for="companyname">Enter Company name</label>
                <input type="text" name="companyname" id="companyname" 
                value="<?php     if(array_key_exists('companyname',$_POST)){
                                    echo htmlspecialchars($_POST['companyname']) ?? '';
                                }; ?>"
                >
            </div>  

            
            <div class="inputWrapper displayFlex">
                <label for="cPerson">Enter Contact person</label>
                <input type="text" name="cPerson" id="cPerson" 
                value="<?php     if(array_key_exists('cPerson',$_POST)){
                                    echo htmlspecialchars($_POST['cPerson']) ?? '';
                                }; ?>"
                >

                <?php if(array_key_exists("cPerson",$ErrorInsert)):?>
                    <p class="errorP"> <?php echo $ErrorInsert["cPerson"]?> </p>
                <?php endif?>

            </div>  

            
            <div class="inputWrapper displayFlex">
                <label for="cPerson">Enter Phone</label>
                <input type="text" name="phone" id="phone" 
                value="<?php     if(array_key_exists('phone',$_POST)){
                                    echo htmlspecialchars($_POST['phone']) ?? '';
                                }; ?>"
                >
            </div>  

            <div class="inputWrapper displayFlex">
                <label for="street">Enter street name</label>
                <input type="text" name="street" id="street" 
                value="<?php     if(array_key_exists('street',$_POST)){
                                    echo htmlspecialchars($_POST['street']) ?? '';
                                }; ?>"
                >

                <?php if(array_key_exists("street",$ErrorInsert)):?>
                    <p class="errorP"> <?php echo $ErrorInsert["street"]?> </p>
                <?php endif?>


            </div>  
            

            <div class="inputWrapper displayFlex">
                <label for="streetNum">Enter street number</label>
                <input type="text" name="streetNum" id="streetNum" 
                value="<?php     if(array_key_exists('streetNum',$_POST)){
                                    echo htmlspecialchars($_POST['streetNum']) ?? '';
                                }; ?>"
                >
            </div>  

            <div class="inputWrapper displayFlex">
                <label for="plz">Enter PLZ</label>
                <input type="text" name="plz" id="plz" 
                value="<?php     if(array_key_exists('plz',$_POST)){
                                    echo htmlspecialchars($_POST['plz']) ?? '';
                                }; ?>"
                >
            </div>  

            <div class="inputWrapper displayFlex">
                <label for="town">Enter town</label>
                <input type="text" name="town" id="town" 
                value="<?php     if(array_key_exists('town',$_POST)){
                                    echo htmlspecialchars($_POST['town']) ?? '';
                                }; ?>"
                >

                <?php if(array_key_exists("town",$ErrorInsert)):?>
                    <p class="errorP"> <?php echo $ErrorInsert["town"]?> </p>
                <?php endif?>

            </div>  

            <div class="inputWrapper displayFlex">
                <label for="country">Enter Country</label>
                <input type="text" name="country" id="country" 
                value="<?php     if(array_key_exists('country',$_POST)){
                                    echo htmlspecialchars($_POST['country']) ?? '';
                                }; ?>"
                >


                <?php if(array_key_exists("notInserted",$ErrorInsert)):?>
                    <p class="errorP"> <?php echo $ErrorInsert["notInserted"]?> </p>
                <?php endif?>

            </div>  


            <input type="submit" class="loginBTN" name="submit" value="Register">
            <input type="submit" class="loginBTN cancelBtn" name="cancel" value="Cancel">

        </form>

            
    </div>

                

    <?php include("./footer.php");?>
</html>