<!DOCTYPE html>
<html>
<head>
    <title>AJAX AND API</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="js/functions.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style> 
    
    #main{
    margin: auto;
    width: 80%;
    border: 3px solid blue;
    padding: 10px;
    }
    #load {
        visibility: hidden;
     }
     img{
         width: 100px;
     }
     .table {
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 3;

        -webkit-column-gap: 40px; /* Chrome, Safari, Opera */
        -moz-column-gap: 40px; /* Firefox */
        column-gap: 40px;
    }
    </style>
</head>
<body>
<br><br>  
    <div id="main">
    <br><br>
    Enter the name of a city in CA below to get up-coming sports events from the Active.com API.
    <br>
    (Example: Modesto or Sacremento)
    <br>
    <input id="city" type="text" name="city">
    <br><br>
    <button id="search-button" class="btn btn-primary" onclick="getApi();">Search</button>
<div id="times">
</div>
<div id="table">
</div>
<div id="load"><img  src="img/loading.gif" /></div>
</div>

</body>
</html>