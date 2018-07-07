    <?php
        include 'functions.php';
        ?>

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
            <h1> Are you ready to run a marathon? </h1>
        </header>
        <div id="response">
    <?php
            echo "<div id=answer> ";
            tellMe();
            echo "</div>";
    ?>
        </div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<img id="homer" src="img/homer.gif" alt="Homer Running" width="100" class="center">
		<hr>
		<span class="error">Fields marked with * are mandatory.</span>
            <br/><br/>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="<?php echo ($name);?>">
            <span class="error">* <?php echo $nameErr;?></span>
            
            <br/><br/>
                <label for="gender">I am a:</label><br/>
                <span class="error">* <?php echo $genderErr;?></span><br/>
                <input type="radio" name="gender" value="male" <?php if($gender=='male'){echo 'checked="checked"';} ?>> Male<br>
                <input type="radio" name="gender" value="female" <?php if($gender=='female'){echo 'checked="checked"';} ?>> Female<br>
                <input type="radio" name="gender" value="other" <?php if($gender=='other'){echo 'checked="checked"';} ?>> Other
            
            <br/><br/>
                <label for="shoe">Do you own shoes?</label><br/>
                <span class="error">* <?php echo $shoeErr;?></span><br/>
                <input type="radio" name="shoe" value="yes" <?php if($shoe=='yes'){echo 'checked="checked"';} ?>> Yes<br>
                <input type="radio" name="shoe" value="no" <?php if($shoe=='no'){echo 'checked="checked"';} ?>> Nope<br>
                
            <br/>
                <label for="legs">Are you able to move your legs?</label><br/>
                <span class="error">* <?php echo $legsErr;?></span><br/>
                <input type="radio" name="legs" value="yes" <?php if($legs=='yes'){echo 'checked="checked"';} ?>> Yes<br>
                <input type="radio" name="legs" value="no" <?php if($legs=='no'){echo 'checked="checked"';} ?>> Nope<br>
                
            <br/>
            
            <label for="howOften">How often do you exercise?</label>
            <select id="howOften" name="howOften">
                <option value="" <?php if($howOften==''){echo 'selected';} ?>></option>
                <option value="day"  <?php if($howOften=='day'){echo 'selected';} ?>>Daily</option>
                <option value="week" <?php if($howOften=='week'){echo 'selected';} ?>>Weekly</option>
                <option value="year" <?php if($howOften=='year'){echo 'selected';} ?>>Yearly</option>
                <option value="once" <?php if($howOften=='once'){echo 'selected';} ?>>Once in my life</option>
            </select>
            <span class="error">* <?php echo $howOftenErr;?></span>
            
            <br/><br/>
            <label for="number">What is the furthest you've ever ran in miles?</label>
            <input id="number" type="number" name="number" value="<?php echo ($number);?>">
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