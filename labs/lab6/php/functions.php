<?php
    include'dbConnection.php';
    
    $conn = getDatabaseConnection();
    function getCategories($catId = 0) {
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option ";
            echo ($record["catId"] == $catId) ? "selected" : "";
            echo " value='" . $record["catId"] ."'>" . $record['catName'] . " </option>";
        }
    }
    
        function getProductInfo() {
        global $conn;
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    function displayAllProducts() {
        global $conn;
        $sql="SELECT * FROM om_product ORDER BY productId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }
    
    function echo_products($records) {
        echo "<table class='table table-hover'>";
        echo "<thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Update</th>
                    <th scope='col'>Remove</th>
                </tr>
            </thead>";
        echo "<tbody>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['productId'] . "</td>";
            echo "<td>" . $record['productName'] . "</td>";
            echo "<td>" . $record['productDescription'] . "</td>";
            echo "<td>" . $record['price'] . "</td>";
            echo "<td><a class='btn btn-primary' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
            
            echo "<td><form action='php/deleteProduct.php' onsubmit='return confirmDelete()'>";
            echo "<input type='hidden' name='productId' value='" . $record['productId'] . "' />";
            echo "<input type='submit' class='btn btn-danger' value='Remove'></td>";
            echo "</form>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    function checkLogin() {
        session_start();
        if (!isset($_SESSION['adminName'])) {
            header("Location:login.php");
        }
    }
    
    function updateDB() {
        global $conn;
        if (isset($_GET['updateProduct'])) {
            $sql = "UPDATE om_product
                    SET productName = :productName,
                        productDescription = :productDescription,
                        productImage = :productImage,
                        price = :price,
                        catId = :catId
                    WHERE productId = :productId;";
            $np = array();
            $np[":productName"] = $_GET['productName'];
            $np[":productDescription"] = $_GET['description'];
            $np[":productImage"] = $_GET['productImage'];
            $np[":price"] = $_GET['price'];
            $np[":catId"] = $_GET['catId'];
            $np[":productId"] = $_GET['productId'];
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
            if(empty($_GET['fresh'])) {
                $loc = "Location:updateProduct.php?fresh=isNow&productId=" . $_GET['productId'];
                header($loc);
            }
        }
    }