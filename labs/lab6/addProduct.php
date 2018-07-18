<?php
    include 'php/functions.php';
    checkLogin();
    
    if (isset($_GET['submitProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
        
        $sql = "INSERT INTO om_product 
                    ( productName, productDescription, productImage, price, catId) 
                    VALUES 
                    ( :productName, :productDescription, :productImage, :price, :catId)";
        
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" type="text/css">
        <title>Add Product</title>
    </head>
    <body>
        <div>
            <nav>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <form action="admin.php">
                            <input type="submit" name="addproduct" class='nav-link' id="beginning" value="Admin Home" />
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="addProduct.php">
                            <input type="submit" name="addproduct" class='nav-link active' id="beginning" value="Add Product" />
                        </form>
                    </li>
                    <li class="nav-item">
                         <form action="logout.php">
                            <input type="submit" class='nav-link' id="beginning" value="Logout"/>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <form>
            <br></br>
            <h1 class="text-center">Enter Product Information</h1>
            <strong>Product Name</strong><input type="text" class="form-control" name="productName"/><br />
            <strong>Description</strong><textarea name="description" class="form-control" cols=50 rows=4> </textarea><br />
            <strong>Price</strong><input type="text" name="price" class="form-control" /><br />
            <strong>Category</strong><select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select><br />
            <strong>Set Image URL</strong><input type="text" name="productImage" class="form-control" /><br />
            <input type="submit" name="submitProduct" class="btn btn-primary" value="Add Product">
        </form>
    </body>
</html>