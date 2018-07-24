<?php
    include'dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    function selectSingleInventory($ship_id) {
        global $conn;
        $sql="select s.name, make, model, i.ship_condition, long_description, 
        cost, i.year_of_production, image_url, action_image_url
        from inventory as i join ships as s on ship = ship_id
        WHERE ship_id = " . $ship_id;
        //WHERE ship_id = " . $_GET['ship_id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    
    function selectShipInfo($ship_id) {
        global $conn;
        $sql="select * from ships
        WHERE ship_id = " . $ship_id;
        //WHERE ship_id = " . $_GET['ship_id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    
    function selectInventoryInfo($inv_id) {
        global $conn;
        $sql="select * from inventory
        WHERE inv_id = " . $inv_id;
        //WHERE inv_id = " . $_GET['inv_id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
    
    function createShip($namedParameters) {
        global $conn;
        $sql = "INSERT INTO ships 
            (name, long_description, make, model, image_url, action_image_url) 
                   VALUES (:name, :long_description, :make, :model, :image_url, :action_image_url)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        return getShipCreatedLast();
    }
    
    function getShipCreatedLast() {
        global $conn;
        $sql="select max(ship_id) as ship_id from ships";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function createInventory($namedParameters) {
        global $conn;
        $sql = "INSERT INTO inventory 
            (ship, ship_condition, cost, year_of_production) 
                   VALUES (:ship, :ship_condition, :cost, :year_of_production)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        return getInventoryCreatedLast();
    }
    
    function getInventoryCreatedLast() {
        global $conn;
        $sql="select max(inv_id) as inv_id from inventory";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    
    function selectAllShips() {
        global $conn;
        $sql="SELECT * FROM ships";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function selectAllInventory() {
        global $conn;
        $sql="select s.name, make, model, i.ship_condition, long_description, 
        cost, i.year_of_production, image_url, action_image_url,
        action_image_url from
        inventory as i join ships as s on ship = ship_id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function selectAllPurchases() {
        global $conn;
        $sql="select p.purchase_id, username, p.date,
        s.name, quantity, sell_price
        from purchase_history as p join users as u
        on p.user_id = u.user_id
        join purchased_items as i on i.purchase_id = p.purchase_id
        join ships as s on s.ship_id = i.ship_id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function updateShip($ship_id, $namedParameters) {
        global $conn;
            $sql = "UPDATE ships 
                    SET name = :name, 
                        long_description = :long_description, 
                        make = :make, 
                        model = :model, 
                        image_url = :image_url, 
                        action_image_url = :action_image_url  
                    WHERE ship_id = " . $ship_id .  "";
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            return $ship_id;
    }
    
    function updateInventory($inv_id, $namedParameters) {
        global $conn;
            $sql = "UPDATE inventory 
                    SET ship = :ship, 
                        ship_condition = :ship_condition, 
                        cost = :cost, 
                        year_of_production = :year_of_production 
                    WHERE inv_id = " . $inv_id .  "";
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            return $inv_id;
    }
    
    function deleteShip($ship_id) {
        global $conn;
            $sql = "DELETE from ships where ship_id = " . $ship_id .  "";
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            return $ship_id;
    }
    
    function shipDropDown($ship_id = 0) {
        global $conn;
        $sql = "SELECT ship_id, name FROM ships ORDER BY name";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option ";
            echo ($record["ship_id"] == $ship_id) ? "selected" : "";
            echo " value='" . $record["ship_id"] ."'>" . $record['name'] . " </option>";
        }
    }
    
    function invDropDown($inv_id = 0) {
        global $conn;
        $sql = 'SELECT inv_id, concat(name," - $", cost) as name  FROM inventory
            join ships on ship = ship_id ORDER BY name';
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option ";
            echo ($record["inv_id"] == $inv_id) ? "selected" : "";
            echo " value='" . $record["inv_id"] ."'>" . $record['name'] . " </option>";
        }
    }
    
    
?>