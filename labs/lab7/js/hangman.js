var selectedWord="";
var selectedHint="";
var board=[];
var guessedWords;
var tests = "test";
var remainingGuesses=6;
var words=[{word: "snake", hint: "It's a reptile"},
            {word: "monkey", hint: "It's a mammal"},
            {word: "beetle", hint: "It's an insect"}];

var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


if(sessionStorage.getItem('guessedWords')){
    guessedWords = JSON.parse(sessionStorage.getItem('guessedWords'));
}else{
    guessedWords=[];
}

window.onload = startGame();

$(".hint").click(function(){
    showHint(true);
    remainingGuesses -= 1;
    updateMan();
    disableButton($(this));
});

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function(){
    location.reload(true);
});

function startGame(){
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    printGuessedWords();
}

function initBoard(){
    for(var letter in selectedWord){
        board.push("_");
    }
}

function pickWord(){
    var  randomInt = Math.floor(Math.random()*words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard(){
    $("#word").empty();
    for(var i = 0; i<board.length; i++){
        $("#word").append(board[i] + " ");
    }
    $("#word").append("<br/>");
}

function showHint(selected){
    if(selected){
        $("#hint").append("<span class='hint'>" + selectedHint + "</span>");
    }
}


function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button  class='letter btn btn-success' id='"+letter+"'>"+letter+"</button>");
    }
}

function checkLetter(letter){
    var positions = new Array();
    
    for(var i = 0; i<selectedWord.length; i++){
        if(letter==selectedWord[i]){
            positions.push(i);
        }
    }
    
    if(positions.length > 0){
        updateWord(positions, letter);
        if(!board.includes('_')){
            
            endGame(true);
            
        }
    }else{
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0){
        endGame(false);
    }
}

function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    
    updateBoard();
}

function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
        guessedWords.push(selectedWord);
        sessionStorage.setItem('guessedWords', JSON.stringify(guessedWords));
    }else{
        $('#lost').show();
    }
}

function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger")
}

function printGuessedWords(){
    
    if(guessedWords.length>0){
        $("#guessedWords").append("Guessed Words:");
        $("#guessedWords").append("<br/>");
        for(var word of guessedWords){
            $("#guessedWords").append("<span class='guessedWords'>" + word + "</span>");
            $("#guessedWords").append("<br/>");
        }
    }
}