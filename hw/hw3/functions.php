<?php

$fullName = $gender = $howOften = $number = $shoe = $legs = $number = "";
$nameErr = $genderErr = $howOftenErr = $numberErr = $shoeErr = $legsErr = $numberErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  
  if (empty($_POST["howOften"])) {
    $howOftenErr = "How oftern is required";
  } else {
    $howOften = $_POST["howOften"];
  }

  if (empty($_POST["number"])) {
    $numberErr = "A number is required";
  } else {
    $number = $_POST["number"];
  }
  
  if (empty($_POST["shoe"])) {
    $shoeErr = "A shoe answer is required";
  } else {
    $shoe = $_POST["shoe"];
  }
  
  if (empty($_POST["legs"])) {
    $legsErr = "A leg answer is required";
  } else {
    $legs = $_POST["legs"];
  }
  
}

   function tellMe(){
      
    if (!empty($_POST["name"]) && !empty($_POST["gender"]) && !empty($_POST["shoe"]) && !empty($_POST["legs"]) && !empty($_POST["howOften"]) && !empty($_POST["number"])){
      
      
      if ($_POST["number"] > 10 && $_POST["shoe"] == "yes" && $_POST["shoe"] == "yes" && ($_POST["howOften"] == "week" || $_POST["howOften"] == "day")  ){
      echo "Well ". $_POST['name'].", YES YOU ARE!!!";
      }else if ($_POST["shoe"] == "no"){
      echo "Well ". $_POST['name'].", you need to buy shoes first.";
      }else if ($_POST["legs"] == "no"){
      echo "Well ". $_POST['name'].", you need to regian control of your legs first.";
      }else if ($_POST["howOften"] == "once" || $_POST["howOften"] == "year"){
      echo "Well ". $_POST['name'].", you need to exercise more first.";
      }else if($_POST["number"] < 10){
      echo "Well ". $_POST['name'].", you need to run longer distances first.";
      }
        
      } else {
        echo '';
      }
   }
?>