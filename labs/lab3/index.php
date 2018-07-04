
<?php
	$backgroundImage = "img/sea.jpg";
	
	if(empty($_GET['keyword']) && empty($_GET['category'])){
	    echo "<br/><br/>";
	    echo "<strong>! Please enter a keyword or select a category !</strong>";
	}
	elseif(empty($_GET['category'])){
	    echo "You searched for: ".$_GET['keyword'];
	    include 'api/pixabayAPI.php';
	    $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
	    
	   $backgroundImage = $imageURLs[array_rand($imageURLs)];
	}elseif(empty($_GET['keyword'])){
	    echo "You searched for: ".$_GET['category'];
	    include 'api/pixabayAPI.php';
	    $imageURLs = getImageURLs($_GET['category'], $_GET['layout']);
	   $backgroundImage = $imageURLs[array_rand($imageURLs)];
	}
?>

<!DOCTYPE html>

<html>
    <head>
		
        <title>Image Carousel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">		
		
		<style>
			@import url("css/styles.css");
			body{
				background-image: url(<?=$backgroundImage?>);
                background-size: cover;
			}
		</style>
	</head>

    <body>
        <br/><br/>
        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }else{
        ?>
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <!-- Indicators Here -->
                 <ol class="carousel-indicators">
                    <?php
                        for($i=0;$i<7;$i++){
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i==0)? "class='active'": "";
                            echo "></li>";
                        }
                    ?>
                  </ol>

                <!-- Wrapper for images -->
                <div class="carousel-inner" role="listbox">
                    <?php
                        for($i=0;$i<7;$i++){
                            do{
                                $randomIndex = rand(0,count($imageURLs));
                            }while(!isset($imageURLs[$randomIndex]));
                            
                            echo '<div class="item ';
                            echo ($i==0)?"active":"";
                            echo '">';
                            echo '<img src="'.$imageURLs[$randomIndex].'">';
                            echo '</div>';
                            unset($imageURLs[$randomIndex]);
                        }
                    ?>
                </div>
                
                <!-- Controls Here -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
            
            <?php
                 }
            ?>
            
            <br/>
            
		<form>
		      <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
		      
		      <br/><br/>
		      <input type="radio" id="lhorizontal" name="layout" value="horizontal">
		      <label for="Horizontal"></label>
		      <label for="lhorizontal"> Horizontal</label>
		      <br/>
		      <input type="radio" id="lvertical" name="layout" value="vertical">
		      <label for="Vertical"></label>
		      <label for="lvertical">Vertical</label>
		      
		      <br/><br/>->
		      <select name="category">
		          <option value="">Select One</option>
		          <option value="triathlon">Triathlon</option>
		          <option value="hang gliding">Hang Gliding</option>
		          <option value="space">Space</option>
		          <option value="pie">Pie</option>
		          <option value="octopus">Octopus</option>
		      </select>
		      
		      <br/><br/><br/>
		      <input type="submit" value="Search"/>
		</form>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>