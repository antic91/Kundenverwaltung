<?php 
    session_start();
    include_once '../validation/insertValidation.php';
    include_once '../models/customers.php';
    include_once '../config/connection.php';
    $ErrorInsert = [];


    if(isset($_POST["submit"])){
        
        include '../apis/editAPI.php';
    

    }

    if(isset($_POST["cancel"])){
        header("Location: ./index.php");
    }

?>


    <!-- Include Header -->
<?php include("./header.php");?>
<!-- Include Div with user data deleted/Adder/Edited -->
<?php include("./loggedUserData.php");?>

<section class="displayFlex notLoggedIndex center" style="min-height: 750px;">
    <!-- Form Post Request EDIT-->
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="loginForm">
        
        <div class="inputWrapper displayFlex">
            <label for="companyname">Enter Company name</label>
            <input type="text" name="companyname" id="companyname" 
            value="<?php echo $_SESSION["POST"]["kun_firmename"];?>"
            >
        </div>  

        
        <div class="inputWrapper displayFlex">
            <label for="cPerson">Enter Contact person</label>
            <input type="text" name="cPerson" id="cPerson" 
            value="<?php echo $_SESSION["POST"]["kun_anspr_person"];?>"
            >

            <?php if(array_key_exists("cPerson",$ErrorInsert)):?>
                <p class="errorP"> <?php echo $ErrorInsert["cPerson"]?> </p>
            <?php endif?>

        </div>  

        
        <div class="inputWrapper displayFlex">
            <label for="cPerson">Enter Phone</label>
            <input type="text" name="phone" id="phone" 
            value="<?php echo $_SESSION["POST"]["kun_telefon"];?>"
            >
        </div>  

        <div class="inputWrapper displayFlex">
            <label for="street">Enter street name</label>
            <input type="text" name="street" id="street" 
            value="<?php echo $_SESSION["POST"]["kun_adresse"];?>"
            >

            <?php if(array_key_exists("street",$ErrorInsert)):?>
                <p class="errorP"> <?php echo $ErrorInsert["street"]?> </p>
            <?php endif?>


        </div>  
        

        <div class="inputWrapper displayFlex">
            <label for="streetNum">Enter street number</label>
            <input type="text" name="streetNum" id="streetNum" 
            value="<?php echo $_SESSION["POST"]["kun_street_num"];?>"
            >
        </div>  

        <div class="inputWrapper displayFlex">
            <label for="plz">Enter PLZ</label>
            <input type="text" name="plz" id="plz" 
            value="<?php echo $_SESSION["POST"]["kun_plz"];?>"
            >
        </div>  

        <div class="inputWrapper displayFlex">
            <label for="town">Enter town</label>
            <input type="text" name="town" id="town" 
            value="<?php echo $_SESSION["POST"]["kun_town"];?>"
            >

            <?php if(array_key_exists("town",$ErrorInsert)):?>
                <p class="errorP"> <?php echo $ErrorInsert["town"]?> </p>
            <?php endif?>

        </div>  

        <div class="inputWrapper displayFlex">
            <label for="country">Enter Country</label>
            <input type="text" name="country" id="country" 
            value="<?php echo $_SESSION["POST"]["kun_country"];?>"
            >


            <?php if(array_key_exists("notInserted",$ErrorInsert)):?>
                <p class="errorP"> <?php echo $ErrorInsert["notInserted"]?> </p>
            <?php endif?>

        </div>  


        <input type="submit" class="loginBTN" name="submit" value="Confirm your Edit">
        <input type="submit" class="loginBTN cancelBtn" name="cancel" value="Cancel">

    </form>

        
</section>

            

<?php include("./footer.php");?>