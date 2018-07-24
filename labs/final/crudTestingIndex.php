
<html><body>
    
<?php
    include 'php/functions.php';
    
        if (isset($_POST['delete'])) {
        $ship_id = $_POST['delete_ship'];
        
            echo "<!DOCTYPE html>
            <html>
            <head>
            ship deleted with ship_id = ";
            #echo deleteShip($ship_id);
            echo $ship_id;
            echo "</body>
            </html>";
    }
    
?>
    <br></br> 
    <?php 
    echo "selectAllShips() returns all ship types (not inventory)";
    echo "</br></br>";
    $records = selectAllShips(); 
            foreach ($records as $record) {
            echo " " . $record['ship_id'] . " ";
            echo " " . $record['name'] . " ";
            echo " " . $record['long_description'] . " ";
            echo " " . $record['make'] . " ";
            echo " " . $record['model'] . " ";
            echo " " . $record['image_url'] . " ";
            echo " " . $record['action_image_url'] . " ";
            echo "</br>";
        }
    echo "</br></br>";
    echo "selectAllInventory() returns all inventory";
    echo "</br></br>";
    $records = selectAllInventory(); 
            foreach ($records as $record) {
            echo " " . $record['s.name'] . " ";
            echo " " . $record['make'] . " ";
            echo " " . $record['model'] . " ";
            echo " " . $record['make'] . " ";
            echo " " . $record['i.ship_condition'] . " ";
            echo " " . $record['long_description'] . " ";
            echo " " . $record['cost'] . " ";
            echo " " . $record['i.year_of_production'] . " ";
            echo " " . $record['image_url'] . " ";
            echo " " . $record['action_image_url'] . " ";
            echo "</br>";
        }
        
    echo "</br></br>";
    echo "selectSingleInventory(inv_id) returns a single piece of inventory";
    echo "</br></br>";
        $record3 = selectSingleInventory(2); 
            echo " " . $record3['name'] . " ";
            echo " " . $record3['make'] . " ";
            echo " " . $record3['model'] . " ";
            echo " " . $record3['make'] . " ";
            echo " " . $record3['ship_condition'] . " ";
            echo " " . $record3['long_description'] . " ";
            echo " " . $record3['cost'] . " ";
            echo " " . $record3['year_of_production'] . " ";
            echo " " . $record3['image_url'] . " ";
            echo " " . $record3['action_image_url'] . " ";
            
    echo "</br></br>";
    echo "selectAllPurchases() returns all previous purchases";
    echo "</br></br>";
    $records = selectAllPurchases(); 
            foreach ($records as $record) {
            echo " " . $record['purchase_id'] . " ";
            echo " " . $record['username'] . " ";
            echo " " . $record['date'] . " ";
            echo " " . $record['name'] . " ";
            echo " " . $record['quantity'] . " ";
            echo " " . $record['sell_price'] . " ";
            echo "</br>";
        }
    ?>
    
    <br></br>    
    createShip($namedParameters) returns the id of the newly created ship
    <br></br> 
    <form action="php/createShip.php" method="get">
    name: <input type="text" name="name"><br>
    long_description: <input type="text" name="long_description"><br>
    make: <input type="text" name="make"><br>
    model: <input type="text" name="model"><br>
    image_url: <input type="text" name="image_url"><br>
    action_image_url: <input type="text" name="action_image_url"><br>
    <button type="submit" name="submit">Submit</button><br>
    </form>
    <br>
    
    createInventory($namedParameters) returns the id of the newly created inventory
    <br></br> 
    <form action="php/createInventory.php" method="get">
    ship: <input type="text" name="ship"><br>
    ship_condition: <input type="text" name="ship_condition"><br>
    cost: <input type="text" name="cost"><br>
    year_of_production: <input type="text" name="year_of_production"><br>
    <button type="submit" name="submit">Submit</button><br>
    </form>
    
    <br></br>    
    updateShip(ship_id, $namedParameters) returns the id of the updated ship
    <br></br> 
    <?php $record1 = selectShipInfo(2);?>
    <form action="php/updateShip.php" method="get">
    name: <textarea type="text" name="name"><?php echo $record1['name']?></textarea> <br>
    long_description: <textarea type="text" name="long_description"><?php echo $record1['long_description']?></textarea> <br>
    make: <textarea type="text" name="make"><?php echo $record1['make']?></textarea> <br>
    model: <textarea type="text" name="model"><?php echo $record1['model']?></textarea> <br>
    image_url: <textarea type="text" name="image_url"><?php echo $record1['image_url']?></textarea> <br>
    action_image_url: <textarea type="text" name="action_image_url"><?php echo $record1['action_image_url']?></textarea> <br>
    <button type="submit" name="submit">Submit</button><br>
    </form>
 
    <br></br>    
    updateInventory(inv_id, $namedParameters) returns the id of the updated inventory
    <br></br> 
    <?php $record4 = selectInventoryInfo(3);?>
    <form action="php/updateInventory.php" method="get">
    ship: <textarea type="text" name="ship"><?php echo $record4['ship']?></textarea> <br>
    ship_condition: <textarea type="text" name="ship_condition"><?php echo $record4['ship_condition']?></textarea> <br>
    cost: <textarea type="text" name="cost"><?php echo $record4['cost']?></textarea> <br>
    year_of_production: <textarea type="text" name="year_of_production"><?php echo $record4['year_of_production']?></textarea> <br>
    <button type="submit" name="submit">Submit</button><br>
    </form>
    
    <br></br>    
    deleteShip($namedParameters) returns the id of the deleted ship
    </br></br> 
    <form action="#" method="post">
    <select name="delete_ship">
        <option value="">Select One</option>
            <?=shipDropDown()?>
    </select>
    <button type="submit" name="delete">Delete</button><br>
    </form>
    <br><br>
    Example of Inventory DropDown:<br>
    <select name="invDrop">
        <option value="">Select One</option>
            <?=invDropDown()?>
    </select>

</body>
</html>

<?php
    

?>