<?php
function getDatabaseConnection()
{
    $host = "us-cdbr-iron-east-04.cleardb.net";
    $dbname = "heroku_6569e1c531fa5d5";
    $username = "b8a1f803902d2e";
    $password = "f2ce3dee";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>