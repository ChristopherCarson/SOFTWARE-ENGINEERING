<?php
    include 'php/functions.php';
    checkLogin();
    
?>
<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" type="text/css">
        <title>Admin Home</title>
    </head>
    <body>
        <div class="text-center">
            <nav>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <form action="admin.php">
                            <input type="submit" name="addproduct" class='nav-link active' id="beginning" value="Admin Home" />
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="addProduct.php">
                            <input type="submit" name="addproduct" class='nav-link' id="beginning" value="Add Product" />
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
        <div>

        <br></br> 
            
            <h1 class="text-center">Current Inventory</h1>
        <?php 
            echo "<br /><br />";
            echo_products(displayAllProducts()); 
        ?>
        </div>
    </body>
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete the product?");
    }
</script>
</html>