<?php
// define variables and set to empty values
$nameErr = $genderErr = $howOftenErr = $numberErr = "";
$name =  $gender = $howOften = $number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  
  if (empty($_POST["howOften"])) {
    $howOftenErr = "This is required";
  } 

  if (empty($_POST["number"])) {
    $numberErr = "This is required";
  } 
  
}

if(isset($_GET)){
         echo "Hello " .$_GET['name']. ", don't run!";

   }
   

?>