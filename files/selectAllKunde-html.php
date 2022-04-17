<?php 


        include_once("../apis/selectAllKunde.php");

?>

<!DOCTYPE html>
<html lang="en">

        <!-- For each loop for array with Customers.... displayin every customer data in this divs under...s -->
        <?php foreach ($_SESSION["CustomersArray"] as $key => $customer): ?>
            <div class="CusstomerData displayFlex">

            

                <div class="displayFlex childWrapper">
                    <h3><?php echo$customer["kun_id"] . ". Company: " . $customer["kun_firmename"]; ?></h3>
                </div>

                <div class="childWrapper displayFlex">
                    <h4 class="sizeHeaders"><td><?php echo "<span class='spannHeader'>Adress: </span>" . $customer["kun_adresse"] . " " . $customer["kun_street_num"] . ", " . $customer["kun_plz"] . " " . $customer["kun_town"] . " <b>" . $customer["kun_country"] . "</b>"; ?></td></h4>
                </div>

                <div class="childWrapper displayFlex">
                    <h5 class="sizeHeaders"> <span class="spannHeader">Customer added by:</span> <?php echo $customer["user_username"]; ?></h5> 
                </div>
                
                <div class="childWrapper displayFlex">
                    <h6 class="sizeHeaders"> <span class="spannHeader">Contact Person:</span> <?php echo $customer["kun_anspr_person"]; ?></h6>
                </div>

                <div class="childWrapper displayFlex">
                    <p class="sizeHeaders"> <span class="spannHeader">Created:</span> <?php echo $customer["kun_created"]; ?></p>
                </div>
                <div class="childWrapper displayFlex">
                    <p class="sizeHeaders"><span class="spannHeader">Last time edited:</span> <?php echo $customer["kun_changed"]; ?></p>
                </div>

                <div class="childWrapper displayFlex">
                    <button type="button" class="btn" onclick="clicked(<?php echo $customer['kun_id'];?>)" <?php if($customer["user_id"] != $_SESSION["userData"]["user_id"]){echo "disabled";}?>>Delete</button>
                    <button type="button" class="btn btnRight" onclick="clickedEdit(<?php echo $customer['kun_id'];?>)"  <?php if($customer["user_id"] != $_SESSION["userData"]["user_id"]){echo "disabled";}?>>Edit</button>
                </div>

            </div>
        <?php endforeach?>
</html>

