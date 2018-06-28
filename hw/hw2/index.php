<!DOCTYPE html>
<html>
    <head>
        <title> Rock Paper Scissors </title>

        <style>
            @import url("css/styles.css");
        </style>
    </head>
<body>
         <header>
            <h1> Rock Paper Scissors </h1>
        </header>
    <div id="main">
        <hr>
        <br /><br />
    <form method="post">
        <input id="input1" name="rock" type="submit" value="Rock"/>
        <input id="input2" name="paper" type="submit" value="Paper"/>
        <input id="input3" name="scissors" type="submit" value="Scissors"/>
        <input id="input4" name="random" type="submit" value="Random"/>
    </form>
        <?php
            include 'inc/functions.php';
        ?>
    </div>
    </body>
            <footer>
            <hr>
                336 Internet Programming. 2018&copy; Carson <br />
                <strong>Disclaimer:</strong> This game is great. You will be addicted.
                <br /><br />
                <small>Cartoon Rock, Paper and Scissors. Digital image. Devian Art. https://orig00.deviantart.net/8c78/f/2012/238/f/2/rock__paper__scissors__by_sweetnminty-d5cimzn.png</small>
                <br /><br />
                <figure id="logo">
                    <img src="img/CSUMB.png" alt="CSUMB logo" width="75">
                </figure>
        </footer>
        
</html>