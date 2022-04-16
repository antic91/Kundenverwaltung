<?php 
    if(isset($_GET["allCustomers"])){
        $_SESSION["user_status"] = 1;
    }

    if(isset($_GET["userCustomers"])){
        $_SESSION["user_status"] = 2;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <div class="wrapperButtons displayFlex">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <input class="btn1 <?php if($_SESSION["user_status"]==1){echo "btnSelected";}; ?>" type="submit" name="allCustomers" value="All Custromers">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <input class="btn1 <?php if($_SESSION["user_status"]!=1){echo "btnSelected";}; ?>" type="submit" name="userCustomers" value="User Customers">
        </form>


    </div>
</html>

