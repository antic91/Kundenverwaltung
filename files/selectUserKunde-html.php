<?php 

include_once("../apis/selectUserKunde.php");
    
?>

<!DOCTYPE html>
<html lang="en">


    <!-- <table>

            <thead>
                <tr>
                    <td>Customer id</td>
                    <td>Edited by</td>
                    <td>Company</td>
                    <td>Contact Person</td>
                    <td>Phone</td>
                    <td>Adress</td>
                    <td>Street number</td>
                    <td>Town</td>
                    <td>PLZ</td>
                    <td>Country</td>
                    <td>Created at</td>
                    <td>Last change</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($_SESSION["CustomersArray"] as $key => $customer): ?>
                    <tr>
                        <td><?php echo $customer["kun_id"]; ?></td>
                        <td><?php echo $customer["user_username"]; ?></td>
                        <td><?php echo $customer["kun_firmename"]; ?></td>
                        <td><?php echo $customer["kun_anspr_person"]; ?></td>
                        <td><?php echo $customer["kun_telefon"]; ?></td>
                        <td><?php echo $customer["kun_adresse"]; ?></td>
                        <td><?php echo $customer["kun_street_num"]; ?></td>
                        <td><?php echo $customer["kun_town"]; ?></td>
                        <td><?php echo $customer["kun_plz"]; ?></td>
                        <td><?php echo $customer["kun_country"]; ?></td>
                        <td><?php echo $customer["kun_created"]; ?></td>
                        <td><?php echo $customer["kun_changed"]; ?></td>
                        <td>
                            <button onclick="clicked(<?php echo $customer['kun_id'];?>)">Delete</button>
                        </td>
                        <td>
                            <button onclick="clickedEdit(<?php echo $customer['kun_id'];?>)">Edit</button>
                        </td>
                       
                    </tr>
                <?php endforeach?>
            </tbody>
        </table> -->

        <?php foreach ($_SESSION["CustomersArray"] as $key => $customer): ?>
            <div class="CusstomerData displayFlex">

                <div class="displayFlex childWrapper">
                    <h3><?php echo$customer["kun_id"] . ". Company: " . $customer["kun_firmename"]; ?></h3>
                </div>

                <div class="childWrapper displayFlex">
                    <h4><td><?php echo "Adress: " . $customer["kun_adresse"] . " " . $customer["kun_street_num"] . ", " . $customer["kun_plz"] . " " . $customer["kun_town"] . " <b>" . $customer["kun_country"] . "</b>"; ?></td></h4>
                </div>

                <div class="childWrapper displayFlex">
                    <h5>Customer added by: <?php echo $customer["user_username"]; ?></h5>
                    <h6>Contact Person: <?php echo $customer["kun_anspr_person"]; ?></h6>
                </div>

                <div class="childWrapper displayFlex">
                    <p>Created: <?php echo $customer["kun_created"]; ?></p>
                    <p>Last time edited: <?php echo $customer["kun_changed"]; ?></p>
                </div>

                <div class="childWrapper displayFlex">
                    <button onclick="clicked(<?php echo $customer['kun_id'];?>)">Delete</button>
                    <button onclick="clickedEdit(<?php echo $customer['kun_id'];?>)">Edit</button>
                </div>

            </div>
        <?php endforeach?>            
    
</html>

