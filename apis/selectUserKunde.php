<?php 

        include_once "../config/connection.php";
        include_once "../models/customers.php";

        $dbConn1 = new Connection();

        $userCustomers = new Custromers($dbConn1->getDB());

        $_SESSION["CustomersArray"] = $userCustomers->selectUserCustomers($_SESSION["userData"]["user_id"]);    
    
?>

<!DOCTYPE html>
<html lang="en">


    <table>

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

                       
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>


    
</html>

