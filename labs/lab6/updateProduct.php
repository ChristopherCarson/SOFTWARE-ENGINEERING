<?php
    include 'php/functions.php';
    checkLogin();
    
    if (isset ($_GET['productId'])) {
        $product = getProductInfo();
    }
    updateDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" type="text/css">
        <title>Update Product</title>
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
            <br /><br />
            <?php 
                if (isset ($_GET['fresh'])) {
                    echo "<h1 class='text-center'>Product Information Updated</h1>";
                } else {
                    echo "<h1 class='text-center'>Update Product Information</h1>";
                }
            ?>
            <br />
            <input type="hidden" name="productId" value="<?=$product['productId']?>" />
            <h3>Product Name</h3> <input type="text" class="form-control" value="<?=$product['productName']?>" name="productName"/><br />
            <h3>Description</h3> <textarea name="description" class="form-control" cols=50 rows=4><?=$product['productDescription']?></textarea><br />
            <h3>Price</h3> <input type="text" class="form-control" name="price" value="<?=$product['price']?>"><br />
            <h3>Category</h3> <select name="catId" class="form-control">
                <option>Select One</option>
                <?php getCategories( $product['catId']); ?>
            </select><br />
            <h3>Image URL</h3> <input type="text" class="form-control" name="productImage" value="<?=$product['productImage']?>"><br />
            <ul class="nav nav-pills float">
                <li class="nav-item">
                    <input type="submit" class="btn btn-primary" name="updateProduct" value="Update Product" />
                    </li>
                <li class="nav-item">
                    <a class='btn btn-secondary' href='admin.php'>Cancel</a>
                </li>
            </ul>
        </form>
    </body>
</html>