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
    <!-- Wraper -->
    <div class="wrapperButtons displayFlex">
        <!-- Wrapper for two button userCustomers and AllCustomers -->
        <div class="wrapperButtonsForm displayFlex">
            <!-- Form for button All Customers -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                <input class="btn1 <?php if($_SESSION["user_status"]==1){echo "btnSelected";}; ?>" type="submit" name="allCustomers" value="All Custromers">
            </form>
            <!-- Form for button user Customers -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                <input class="btn1 btn2 <?php if($_SESSION["user_status"]!=1){echo "btnSelected";}; ?>" type="submit" name="userCustomers" value="User Customers">
            </form>

        </div>
        <!-- Button to add new customer -->
        <button class="btn1 btnAdd" onclick="addCustomer()">Add New Customer</button>

    </div>
</html>

