<?php 


?>

<!DOCTYPE html>
<html lang="en">
    <div class="wrapperData displayFlex">

        <div class="displayFlex child One">
            <h2>User Added:</h2>
            <p><?php echo $_SESSION["user_added"]?></p>
        </div>

        <div class="displayFlex child Two">
            <h2>User Deleted:</h2>
            <p><?php echo $_SESSION["user_deleted"]?></p>
        </div>
            
        <div class="displayFlex child Three">
            <h2>User Changed:</h2>
            <p><?php echo $_SESSION["user_edited"]?></p>
        </div>
    </div>
</html>