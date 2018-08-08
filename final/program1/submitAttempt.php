<?php
session_start();
include "dbConnection.php";
$connect = getDatabaseConnection();

global $correct;
//Adding new score to database
$sql = "INSERT INTO attempts (correct)
        VALUES (:correct)";
        
$data = array(
    ":correct" => $correct
);
$stmt = $connect->prepare($sql);
$stmt->execute($data);
//Retrieving total times quiz has been submitted and average score for this user
$sql = "SELECT count(correct) as times
        FROM attempts
        WHERE correct='correct'";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":username"=>$_SESSION['username']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//Encoding data using JSON
echo json_encode($result);
?>