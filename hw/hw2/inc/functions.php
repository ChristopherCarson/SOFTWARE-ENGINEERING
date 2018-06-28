<?php

$choices = "paper,rock,scissors";
$array = array();
$array = explode(",",$choices);

foreach ($array as $item) {

    if(array_key_exists($item,$_POST)){
        display($item);
        $computerChoice = computerTurn();
        checkWin($item, $computerChoice);
    }
}

if(array_key_exists("random",$_POST)){
        $random = $array[array_rand($array)];
        display($random);
        $computerChoice = computerTurn();
        checkWin($random, $computerChoice);
}

function display($item){
    echo "<img id='playerImage' src='img/$item.png' alt='$item' title='$item' width='70' />";
    echo "<div id='results'> You chose $item.</div>";
    
}

function checkWin($item, $computerChoice){
    global $array;

    $x = 0; 
    while($x <= count($array)) {
    
    if($x==2){
        $win=0;
    }else{
        $win=$x+1;
    }
    
    if($x==1){
        $loose=0;
    }else if($x==2){
        $loose=1;
    }else{
        $loose=$x+2;
    }
    
    
    if($item === $array[$x] && $computerChoice === $array[$win]){
        echo "<div id='winOrLoose'> You WIN!!!</div>";
    }else if($item === $array[$x] && $computerChoice === $array[$loose]){
        echo "<div id='winOrLoose'> You LOOSE :(</div>";
    }
    $x++;
    } 

    if($item === $computerChoice){
        echo "<div id='winOrLoose'> It's a tie, try again!</div>";
    }

}


function computerTurn(){
    $ranNumber = rand(0,2);
    
    switch ($ranNumber){
    case 0: $compChoice = "paper";
        break;
    case 1: $compChoice = "rock";
        break;
    case 2: $compChoice = "scissors";
        break;
    }  
    echo "<div id='resultsComp'> The PC choose $compChoice.</div>";
    echo "<img id='computerImage' src='img/$compChoice.png' alt='$compChoice' title='$compChoice' width='70' />";
    return $compChoice;
}



?>