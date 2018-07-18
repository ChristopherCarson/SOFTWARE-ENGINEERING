<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css" type="text/css">
        <title>Log in</title>
    </head>
    <body>
        <div class="container container-small">
        <form class="form-signin" method="POST" action="php/loginProcess.php">
            <h2 class="text-center">Please sign in</h2>
            <label for="inputUsername" class="sr-only">Username: </label> <input class="form-control" id="inputUsername" type="text" name="username" placeholder="Username"/> <br />
            <label for="inputPassword" class="sr-only">Password: </label> <input class="form-control" id="inputPassword" type="password" name="password" placeholder="password"/> <br />
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                      <button  class="btn btn-primary" type="submit">Sign in</button>
                    </div>
                </div>
            </div>
        <br /><br />
        <?php
            if ($_SESSION['incorrect']) {
               echo "<p class='lead' id='error' style='color:red'>";
               echo "<strong>Incorrect Username or Password!</strong></p>";
            }
        ?>
        </form>
        </div>
    </body>
</html>