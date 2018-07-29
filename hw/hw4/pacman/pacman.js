//var output;
//var redGhost;
//var blueGhost;
//var pinkGhost;
//var greenGhost;
var loopTimer;
var numLoops = 0;
var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;
var direction = 'right';
var rgDirection;
var bgDirection;
var ggDirection;
var pgDirection;

var pacmanX = 280;
var pacmanY = 240;
var wall_1;
//var gameWindow;


var direction;
var walls = new Array();

const PACMAN_SPEED = 10;
const GHOST_SPEED = 5;

function loadComplete(){
    //output = document.getElementById('output');
    //pacman = document.getElementById('pacman');
    //pacman.style.left = pacmanX + 'px';
    //pacman.style.top = pacmanY + 'px';
    //pacman.style.width = '40px';
    //pacman.style.height = '40px';
    //gameWindow = document.getElementById('gameWindow');
    
    //redGhost = document.getElementById('redGhost');
    //redGhost.style.left = '280px';
    //redGhost.style.top = '80px';
    //redGhost.style.width = '40px';
    //redGhost.style.height = '40px';
    
    //blueGhost = document.getElementById('blueGhost');
    //blueGhost.style.left = '200px';
    //blueGhost.style.top = '40px';
    //blueGhost.style.width = '40px';
    //blueGhost.style.height = '40px';
    
    //greenGhost = document.getElementById('greenGhost');
    //greenGhost.style.left = '400px';
    //greenGhost.style.top = '40px';
    //greenGhost.style.width = '40px';
    //greenGhost.style.height = '40px';
    
    
    loopTimer = setInterval(loop, 50);
    
    				//C
    createWall(120, 80, 40*2, 40);
    createWall(80, 80, 40, 40*6);
    createWall(120, 280, 40*2, 40);
    
    createWall(160, 160, 40, 40*2);
    
    			//S
    createWall(240, 40, 40*3, 40);
    createWall(240, 120, 40*3, 40);
    			//createWall(240, 160, 40, 40);
    createWall(240, 200, 40*3, 40);
    createWall(240, 280, 40*3, 40);
    			//createWall(320, 240, 40, 40);
    
    			//U
    createWall(400, 160, 40, 40*4);
    			//createWall(440, 280, 40, 40);
    createWall(480, 160, 40, 40*4);
    
    
    createWall(400, 80, 40*3, 40);
    
    			//top
    createWall(-20, 0, 660, 40);
    			//left
    createWall(0, 0, 40, 180);
    createWall(0, 220, 40, 180);
    			//right
    createWall(560, 0, 40, 180);
    createWall(560, 220, 40, 180);
    			//bottom
    createWall(-20, 360, 640, 40);
    
    
}

	function createWall(left, top, width, height){
    	var wall = document.createElement('div');
    	$(wall).addClass('wall');
    	//wall.className = 'wall';
    	$(wall).css('left', left);
    	//wall.style.left = left + 'px';
    	$(wall).css('top', top);
    	//wall.style.top =  top + 'px';
    	$(wall).css('height', height);
    	//wall.style.height = height + 'px';
    	$(wall).css('width', width);
    	//wall.style.width = width + 'px';
    	//gameWindow.appendChild(wall);
    
        $(wall).appendTo($("#gameWindow"));
    	walls.push(wall);
    	//output.innerHTML = wall.length;
}



function hitWall(element){
    var hit = false;
    for (var i=0; i<walls.length; i++){
    if( hittest(walls[i], element)) hit = true;
    }
    
    return hit;
}

function loop(){
    
    //output.innerHTML = pacmanX;
    numLoops++;
    tryToChangeDirection();
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    var originalX = pacmanX;
    var originalY = pacmanY;
    
    if(direction=='up'){
        pacmanY = pacmanY - PACMAN_SPEED;
        if(pacmanY < -30) pacmanY = 390;
        $('#pacman').css('top', pacmanY);
        //pacman.style.top = pacmanY + 'px';
    }
    
    if(direction=='down'){
        pacmanY = pacmanY + PACMAN_SPEED;
        if(pacmanY > 390) pacmanY = -30;
        $('#pacman').css('top', pacmanY);
        //pacman.style.top = pacmanY + 'px';
    }
    
    if(direction=='left'){
        pacmanX = pacmanX - PACMAN_SPEED;
        if(pacmanX < -30) pacmanX = 590;
        $('#pacman').css('left', pacmanX);
        //pacman.style.left = pacmanX + 'px';
    }
    
    if(direction=='right'){
        pacmanX = pacmanX + PACMAN_SPEED;
        if(pacmanX > 590) pacmanX = -30;
        $('#pacman').css('left', pacmanX);
        //pacman.style.left = pacmanX + 'px';
    }
    
    moveRedGhost();
    moveBlueGhost();
    moveGreenGhost();
    
    if( hitWall(pacman) ){
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
        pacmanX = originalX;
        pacmanY = originalY;
    }
}


function tryToChangeDirection(){
    var originalX = pacmanX;
    var originalY = pacmanY;
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if(leftArrowDown){
        pacmanX = pacmanX - PACMAN_SPEED;
        $('#pacman').css('left', pacmanX);
        //pacman.style.left = pacmanX + 'px';
        if( ! hitWall(pacman) ){
        direction = 'left';
        pacman.className = "flip-horizontal";
        }
    } 
    if(upArrowDown){
        pacmanY = pacmanY - PACMAN_SPEED;
        $('#pacman').css('top', pacmanY);
        //pacman.style.top = pacmanY + 'px';
        if( ! hitWall(pacman) ){
        direction = 'up';
        pacman.className = "rotate270";
        }
    } 
    if(rightArrowDown){
        pacmanX = pacmanX + PACMAN_SPEED;
        $('#pacman').css('left', pacmanX);
        //pacman.style.left = pacmanX + 'px';
        if( ! hitWall(pacman) ){
        direction = 'right';
        pacman.className = "";
        }
    } 
    if(downArrowDown){
        pacmanY = pacmanY + PACMAN_SPEED;
        $('#pacman').css('top', pacmanY);
        //pacman.style.top = pacmanY + 'px';
        if( ! hitWall(pacman) ){
        direction = 'down';
        pacman.className = "rotate90";
        }
    } 
    
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
        pacmanX = originalX;
        pacmanY = originalY;
}

//$(document).on('keydown', function(event) {
document.addEventListener('keydown', function(event){
    if(event.keyCode==37){
        leftArrowDown = true;
    } 
    if(event.keyCode==38){
        upArrowDown = true;
    } 
    if(event.keyCode==39){
        rightArrowDown = true;
    } 
    if(event.keyCode==40){
        downArrowDown = true;
    } 
});

//$("document").on ('keyup', function(event) {
document.addEventListener('keyup', function(event){
    if(event.keyCode==37){
        leftArrowDown = false;
    } 
    if(event.keyCode==38){
       upArrowDown = false;
    } 
    if(event.keyCode==39){
       rightArrowDown = false;
    } 
    if(event.keyCode==40){
        downArrowDown = false;
    } 
});


function hittest(a, b){
	var aX1 = parseInt(a.style.left);
	var aY1 = parseInt(a.style.top);
	var aX2 = aX1 + parseInt(a.style.width)-1;
	var aY2 = aY1;
	var aX3 = aX1;
	var aY3 = aY1 + parseInt(a.style.height)-1;
	var aX4 = aX2;
	var aY4 = aY3;

	var bX1 = parseInt(b.style.left);
	var bY1 = parseInt(b.style.top);
	var bX2 = bX1 + parseInt(b.style.width)-1;
	var bY2 = bY1;
	var bX3 = bX1;
	var bY3 = bY1 + parseInt(b.style.height)-1;
	var bX4 = bX2;
	var bY4 = bY3;

	var hit = false;
	
	if(aX1>bX1 && aX1<bX2 && aY1>bY1 && aY1<bY3) hit = true;
	else if(aX2>=bX1 && aX2<=bX2 && aY2>=bY1 && aY2<=bY3) hit = true;
	else if(aX3>=bX1 && aX3<=bX2 && aY3>=bY1 && aY3<=bY3) hit = true;
	else if(aX4>=bX1 && aX4<=bX2 && aY4>=bY1 && aY4<=bY3) hit = true;
	else if(bX1>=aX1 && bX1<=aX2 && bY1>=aY1 && bY1<=aY3) hit = true;
	else if(bX2>=aX1 && bX2<=aX2 && bY2>=aY1 && bY2<=aY3) hit = true;
	else if(bX3>=aX1 && bX3<=aX2 && bY3>=aY1 && bY3<=aY3) hit = true;
	else if(bX4>=aX1 && bX4<=aX2 && bY4>=aY1 && bY4<=aY3) hit = true;

	return hit;
}

function moveRedGhost(){
    var rgX = parseInt($('#redGhost').css('left'));
    var rgY = parseInt($('#redGhost').css('top'));
    
    var rgNewDirection;
    var rgOppositeDirection;
    
    if(rgDirection=='left') rgOppositeDirection = 'right';
    else if(rgDirection=='right') rgOppositeDirection = 'left';
    else if(rgDirection=='down') rgOppositeDirection = 'up';
    else if(rgDirection=='up') rgOppositeDirection = 'down';
    
do{
        $('#redGhost').css('left', rgX);
        //redGhost.style.left = rgX + 'px';
        $('#redGhost').css('top', rgY);
        //redGhost.style.top = rgY + 'px';
        
    do{
        var r = Math.floor(Math.random()*4);
        if(r==0) rgNewDirection = 'right';
        else if(r==1) rgNewDirection = 'left';
        else if(r==2) rgNewDirection = 'down';
        else if(r==3) rgNewDirection = 'up';
        
    }while( rgNewDirection == rgOppositeDirection);
    
    if(rgNewDirection == 'right'){
        if(rgX>590) rgX = -30;
        $('#redGhost').css('left', rgX + GHOST_SPEED);
        //redGhost.style.left = rgX + GHOST_SPEED + 'px';
    }else if(rgNewDirection == 'left'){
        if(rgX<-30) rgX = 590;
        $('#redGhost').css('left', rgX - GHOST_SPEED);
        //redGhost.style.left = rgX - GHOST_SPEED + 'px';
    }else if(rgNewDirection == 'down'){
        if(rgY>390) rgY = -30;
        $('#redGhost').css('top', rgY + GHOST_SPEED);
        //redGhost.style.top = rgY + GHOST_SPEED + 'px';
    }else if(rgNewDirection == 'up'){
        if(rgY<-30) rgY = 390;
        $('#redGhost').css('top', rgY - GHOST_SPEED);
        //redGhost.style.top = rgY - GHOST_SPEED + 'px';
    } 
    
} while( hitWall(redGhost));

rgDirection = rgNewDirection;

    if ( hittest(pacman, redGhost)){
      clearInterval(loopTimer);
    }
}




function moveBlueGhost(){
    var bgX = parseInt(blueGhost.style.left);
    var bgY = parseInt(blueGhost.style.top);
    
    var bgNewDirection;
    
    var bgOppositeDirection;
    
    if(bgDirection=='left') bgOppositeDirection = 'right';
    else if(bgDirection=='right') bgOppositeDirection = 'left';
    else if(bgDirection=='down') bgOppositeDirection = 'up';
    else if(bgDirection=='up') bgOppositeDirection = 'down';
    
do{
        
        blueGhost.style.left = bgX + 'px';
        blueGhost.style.top = bgY + 'px';
        
    do{
        var r = Math.floor(Math.random()*4);
        if(r==0) bgNewDirection = 'right';
        else if(r==1) bgNewDirection = 'left';
        else if(r==2) bgNewDirection = 'down';
        else if(r==3) bgNewDirection = 'up';
        
    }while( bgNewDirection == bgOppositeDirection);
    
    if(bgNewDirection == 'right'){
        if(bgX>590) bgX = -30;
        blueGhost.style.left = bgX + GHOST_SPEED + 'px';
    }else if(bgNewDirection == 'left'){
        if(bgX<-30) bgX = 590;
        blueGhost.style.left = bgX - GHOST_SPEED + 'px';
    }else if(bgNewDirection == 'down'){
        if(bgY>390) bgY = -30;
        blueGhost.style.top = bgY + GHOST_SPEED + 'px';
    }else if(bgNewDirection == 'up'){
        if(bgY<-30) bgY = 390;
        blueGhost.style.top = bgY - GHOST_SPEED + 'px';
    } 
    
} while( hitWall(blueGhost));

bgDirection = bgNewDirection;

    if ( hittest(pacman, blueGhost)){
      clearInterval(loopTimer);
    }
}

function moveGreenGhost(){
    var ggX = parseInt(greenGhost.style.left);
    var ggY = parseInt(greenGhost.style.top);
    
    var ggNewDirection;
    
    var ggOppositeDirection;
    
    if(ggDirection=='left') ggOppositeDirection = 'right';
    else if(ggDirection=='right') ggOppositeDirection = 'left';
    else if(ggDirection=='down') ggOppositeDirection = 'up';
    else if(ggDirection=='up') ggOppositeDirection = 'down';
    
do{
        
        greenGhost.style.left = ggX + 'px';
        greenGhost.style.top = ggY + 'px';
        
    do{
        var r = Math.floor(Math.random()*4);
        if(r==0) ggNewDirection = 'right';
        else if(r==1) ggNewDirection = 'left';
        else if(r==2) ggNewDirection = 'down';
        else if(r==3) ggNewDirection = 'up';
        
    }while( ggNewDirection == ggOppositeDirection);
    
    if(ggNewDirection == 'right'){
        if(ggX>590) ggX = -30;
        greenGhost.style.left = ggX + GHOST_SPEED + 'px';
    }else if(ggNewDirection == 'left'){
        if(ggX<-30) ggX = 590;
        greenGhost.style.left = ggX - GHOST_SPEED + 'px';
    }else if(ggNewDirection == 'down'){
        if(ggY>390) ggY = -30;
        greenGhost.style.top = ggY + GHOST_SPEED + 'px';
    }else if(ggNewDirection == 'up'){
        if(ggY<-30) ggY = 390;
        greenGhost.style.top = ggY - GHOST_SPEED + 'px';
    } 
    
} while( hitWall(greenGhost));

ggDirection = ggNewDirection;

    if ( hittest(pacman, greenGhost)){
       clearInterval(loopTimer);
    }
}
