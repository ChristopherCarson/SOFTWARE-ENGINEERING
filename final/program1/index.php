<?php
//include 'functions.php';

function getHeroList() {
        include "dbConnection.php";
        $conn = getDatabaseConnection("final");
        
        $sql = "SELECT DISTINCT(name), CONCAT(firstName, ' ',lastName) as fullName,
            image FROM superhero ORDER BY firstName, lastName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
        
        return $record;
    }
    $heros = getHeroList();
    
    $imageArray = array();
    foreach($heros as $hero){
        array_push($imageArray, $hero['image']);
    }
    $nameArray = array();
    foreach($heros as $hero){
        array_push($nameArray, $hero['fullName']);
    }
    $size = count($imageArray);
    $rand = rand(0 , $size-1);
    
    function heroDropDown(){
        global $heros;
        foreach ($heros as $hero) {
            echo '<option <?php if($fullName==' . $hero['fullName'] . "){echo 'selected';} ?> ";
            //echo ($hero["hero_id"] == $hero_id) ?  : "";
            echo " " . $hero['fullName'] . " </option>";
        }
    }
    
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>FINAL - Program 1</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/submit.js"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
        @import url("css/styles.css");
            body {
                text-align: center;
            }
            
        </style>
            
        </style>
    </head>
        
    <body>
       <div class="jumbotron">
    <h3>What is the real name of the following superhero?</h3>
    <?php echo"<img src='img/superheroes/". $imageArray[$rand].".png'" ?> 
    <br /><br />
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
    <select name="heroDrop" id="heroDrop">
        <option value="" selected='true'>Select One</option>
            <?=heroDropDown()?>
    </select>
    <br /><br />
    </form>
    
    <form id="submitButton">
        <input type="button" value="Check Answer" />
    </form>
    
    
    <div id="feedback">
    </div>
    </div>
    <script>
    
    $(document).ready(function(){
        
        $( "#submitButton" ).click(function( event ) {
        
        var heroName = "<?php Print($nameArray[$rand]); ?>";
        //var answer = $("option[name='heroDrop']").val();
        var e = document.getElementById("heroDrop");
        var strUser = e.options[e.selectedIndex].text;
        //document.getElementById("feedback").innerHTML = heroName;

        if(strUser==heroName){
        correctAnswer($("#feedback"));
        }else{
          incorrectAnswer($("#feedback")); 
        }
        
        }); //formSubmit

    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        //score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    }); //documentReady  
        
    </script>
    
    <div id="stats">
    </div>
        
        
     <br /><br />
      <br /><br />
        
   <div>      
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
      <tr style="background-color:#99E999">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
      <tr style="background-color:#99E999">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
      <tr style="background-color:#99E999">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
  </div>  
        

         </body>
</html>