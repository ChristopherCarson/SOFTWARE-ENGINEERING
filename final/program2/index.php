<!DOCTYPE html>
<html>
    <head>
        <title> Final Exam: Part 2 </title>
        <script>
        	var superhero = "";
            var superheroRealName = "";

        </script>
        <script src="js/jquery.min.js"></script>
        <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                 $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        <style>
            body {
                text-align:center;
            }
        </style>        

    </head>
    <body>

        <div class="jumbotron">

            <h2>Select Superhero: </h2>

            <select name="superhero" id="superhero">
            <option>Batman</option><option>Captain America</option><option>Iron Man</option><option>Spiderman</option><option>Superman</option><option>The Hulk</option><option>Wonderwoman</option>            </select>
            <a href="#" data-toggle="tooltip" title="List the heroes from the first seven records in the 'superhero' table, ordered alphabetically "><img src='img/info.png' width='15'></a>

                
            </a>
            <br /><br />
            <input type="button" value="Search Movies!"/>
            <a href="#" data-toggle="tooltip" title="Make AJAX call using the API: https://www.omdbapi.com/?s=superman&apikey=12215ee6. Display Title, Year, and Poster "><img src='img/info.png' width='15'></a>
            
            <br /><br />
            <input type="button" value="Superhero Details"/>
            <a href="#" data-toggle="tooltip" title="Make AJAX call to display Superhero info (full name, place of birth, and image) and all of his/her enemies"><img src='img/info.png' width='15'></a>

            <br><br>
            <a href="history.php" target='searchHistory'> See search history </a>
            <a href="#" data-toggle="tooltip" title="Each time movies are searched,
            use an AJAX call to save into a Session the superhero searched. Use an iframe to display the history of superheroes movies searched."><img src='img/info.png' width='15'></a>

        </div>

        <div id="info">
        </div>

        <iframe name='searchHistory' width='300' height='800' frameborder=0></iframe>
    </body>
</html>