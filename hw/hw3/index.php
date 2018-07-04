<!DOCTYPE html>
<html>
    <head>
        <title>The Run Meter</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Wendy+One');
            @import url("css/styles.css");
        </style>
        
    </head>
    <body>
        <header> 
            <h1> Are you ready to run? </h1>
        </header>
        <div id="response">
    <?php
        include 'functions.php';

        if(isset($_GET)){
            echo "<div id=answer> ";
            #tellMe();
            echo "</div>";
         }
    ?>
        </div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<img id="homer" src="img/homer.gif" alt="Homer Running" width="100" class="center">
		<hr>
		<span class="error">Fields marked with * are mandatory.</span>
            <br/><br/>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="<?=$_GET['name']?>">
            <span class="error">* <?php echo $nameErr;?></span>
            
            <br/><br/>
                <label for="gender">I am a:</label><br/>
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other
                <br/>
                <span class="error">* <?php echo $genderErr;?></span>
            <br/><br/>
            
            <label for="howOften">How often do you exercise?</label>
            <select id="howOften" name="howOften">
                <option value="day">Daily</option>
                <option value="week">Weekly</option>
                <option value="year">Yearly</option>
                <option value="once">Once in my life</option>
            </select>
            <span class="error">* <?php echo $howOftenErr;?></span>
            
            <br/><br/>
            <label for="number">What is the furthest you've ever ran?</label>
            <input id="number" type="number" value="0">
            <span class="error">* <?php echo $numberErr;?></span>
            
            <br/><br/>
            <button type="submit" value="Submit">Submit</button>
        </form>
        
         <br/><br/><br/><br/>
        <footer>
            <hr>
                336 Internet Programming. 2018&copy; Carson <br />
                <strong>Disclaimer:</strong>The information in this website is fictitous. <br />
                It is used for academic greatness only.<br />
                
                <figure id="logo">
                    <img src="img/CSUMB.png" alt="CSUMB logo" width="75">
                </figure>
                <br />
                <small>Homer Running. Digital image. Tenor. https://media1.tenor.com/images/36765eac982b006ac949db8b81f1ca78/tenor.gif?itemid=5710355</small>
        </footer>
    </body>
</html>